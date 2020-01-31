<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\DrawPrize;
use App\Http\Requests\AddDrawPrizeRequest;

class AdministratorPrizesController extends Controller
{
	public function index() {
		$title = 'Lucky Draw Prizes';
		$prizes = DrawPrize::all();
		return view('admin_prizes.index', compact('title', 'prizes'));
	}

	public function create(AddDrawPrizeRequest $request) {
		$input['name'] = ucfirst($request->name);
		DrawPrize::create($input);
		$request->session()->flash('prize_created', 'The draw prize has been created!');
		return redirect()->back();
	}

	public function edit($id) {
		$title = 'Edit Lucky Draw Prize';
		$prize = DrawPrize::findOrFail($id);
		return view('admin_prizes.edit', compact('prize', 'title'));
	}

	public function update(AddDrawPrizeRequest $request, $id) {
		DrawPrize::findOrFail($id)->update($request->all());
		session()->flash('prize_updated', 'The draw prize has been successfully updated!');
    return redirect()->back(); 
	}

	public function destroy($id) {
    DrawPrize::findOrFail($id)->delete();
    session()->flash('prize_deleted', 'The draw prize has been successfully deleted!');
    return redirect()->back();
  }
}
