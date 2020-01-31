<?php

namespace App\Http\Controllers;
use App\DrawPrize;
use App\DrawGroup;
use App\DrawMember;
use App\Draw;
use App\Http\Requests\AddDrawRequest;
use App\Http\Requests\MakeDrawRequest;
use Illuminate\Http\Request;

class AdministratorsController extends Controller
{

	public function index() {
		$title = 'Lucky Draw';
		$winners = array();
		$members = array();
		$prize_arr = array();
		$draw = Draw::where('status', 1)->first();
		
		if($draw) {
			$winners = DrawGroup::where('draw_id', $draw->id)->orderBy('draw_prize_id', 'ASC')->get();
			$prize_arr = DrawGroup::where('draw_id', $draw->id)->pluck('draw_prize_id')->all();
			$members = DrawMember::where('draw_id', $draw->id)->get();
		}
		$prizes = DrawPrize::whereNotIn('id', $prize_arr)->pluck('name', 'id')->all(); 
		return view('admin.index', compact('title', 'prizes', 'winners', 'draw', 'members'));
	}

	public function create(AddDrawRequest $request) {
		$input['name'] = ucfirst($request->name);
		$input['status'] = 1;
		Draw::create($input);
		$request->session()->flash('draw_created', 'The lucky draw has been created!');
		return redirect()->back();
	}

	public function draw(MakeDrawRequest $request) {
		$input = $request->except('gen_number');
		if($request->draw_prize_id == 1 && $request->gen_number == 1) {
			$numberArr = array();
			$getWinners = DrawGroup::where('draw_id', $request->draw_id)->where('draw_member_id', '!=', '')->pluck('draw_member_id')->all();
			$getHighest = DrawMember::where('draw_id', $request->draw_id)->orderBy('total', 'DESC')->first();
			$getNumbers = DrawMember::where('draw_id', $request->draw_id)->where('total', $getHighest->total)->whereNotIn('id', $getWinners)->get();
			foreach($getNumbers As $data) {
				if($data->number1)
					array_push($numberArr, $data->number1.'-'.$data->id);
				if($data->number2)
					array_push($numberArr, $data->number2.'-'.$data->id);
				if($data->number3)
					array_push($numberArr, $data->number3.'-'.$data->id);
				if($data->number4)
					array_push($numberArr, $data->number4.'-'.$data->id);
				if($data->number5)
					array_push($numberArr, $data->number5.'-'.$data->id);
			}
			$randIndex = array_rand($numberArr);
			$winner = $numberArr[$randIndex];
			$winner = explode("-",$winner);
			$input['number'] = $winner[0];
			$input['draw_member_id'] = $winner[1];
			$request->session()->flash('draw_maked', 'You have drawn a winner for the grand prize!');
		} else {
			if($request->gen_number == 1) {
				$input['number'] = rand(1000, 9999);
			}
			$member = DrawMember::
							where(function($query) use ($input) {
								return $query->where('number1', 'LIKE', '%'.$input['number'].'%')
	              ->orWhere('number2', 'LIKE', '%'.$input['number'].'%')
	              ->orWhere('number3', 'LIKE', '%'.$input['number'].'%')
	              ->orWhere('number4', 'LIKE', '%'.$input['number'].'%')
	              ->orWhere('number5', 'LIKE', '%'.$input['number'].'%');
							})								
              ->where('draw_id', $request->draw_id)
              ->first();
	    if($member) {
	    	$chkWinner = DrawGroup::where('draw_member_id', $member->id)->where('draw_id', $request->draw_id)->first();
	    	if($chkWinner) {
	    		$request->session()->flash('draw_member_won', 'The member has won already! Please get another winning number!');
	    		return redirect()->back();
	    	}
	    	$input['draw_member_id'] = $member->id;
	    	$request->session()->flash('draw_maked', 'A member has won a prize!');
	    } else {
	    	$request->session()->flash('draw_maked', 'No one has won a prize!');
	    }
	  }
    DrawGroup::create($input);
    return redirect()->back();
	}

	public function destroy($id) {
		Draw::findOrFail($id)->update(['status'=>0]);
    session()->flash('draw_deleted', 'The lucky draw has finished! Start again to start lucky draw!');
		return redirect()->back();
	}
}
