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
		$prize_arr = array();
		$draw = Draw::where('status', 1)->first();
		
		if($draw) {
			$winners = DrawGroup::where('draw_id', $draw->id)->orderBy('draw_prize_id', 'ASC')->get();
			$prize_arr = DrawGroup::where('draw_id', $draw->id)->pluck('draw_prize_id')->all();
		}
		$prizes = DrawPrize::whereNotIn('id', $prize_arr)->pluck('name', 'id')->all(); 
		return view('admin.index', compact('title', 'prizes', 'winners', 'draw'));
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
		if($request->gen_number == 1) {
			$input['number'] = rand(1000, 9999);
		}
		$member = DrawMember::
							where('number1', 'LIKE', '%'.$input['number'].'%')
              ->orWhere('number2', 'LIKE', '%'.$input['number'].'%')
              ->orWhere('number3', 'LIKE', '%'.$input['number'].'%')
              ->orWhere('number4', 'LIKE', '%'.$input['number'].'%')
              ->orWhere('number5', 'LIKE', '%'.$input['number'].'%')
              ->first();
    if($member) {
    	$input['draw_member_id'] = $member->id;
    	$request->session()->flash('draw_maked', 'A member has won a prize!');
    }
    $request->session()->flash('draw_maked', 'No one has won a prize!');
    DrawGroup::create($input);
    return redirect()->back();
	}
}
