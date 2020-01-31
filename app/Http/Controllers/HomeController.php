<?php

namespace App\Http\Controllers;
use App\Draw;
use App\DrawMember;
use App\DrawGroup;
use App\DrawPrize;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;

class HomeController extends Controller
{
  public function index()
  {
    $winners = array();
    $draw = Draw::where('status', 1)->first();
    if($draw) {
      $winners = DrawGroup::where('draw_id', $draw->id)->orderBy('draw_prize_id', 'ASC')->get();
    }
    return view('home.index', compact('draw', 'winners'));
  }

  public function register(RegisterRequest $request) {
    $input = $request->all();
    $input['name'] = ucfirst($request->name);
    $member = DrawMember::create($input);
    $request->session()->flash('member_created', 'Your registration is successful! Please check your registration number: "' . $member->id .'" to check if you won!');
    return redirect()->back();
  }

  public function check(Request $request) {

  }
}
