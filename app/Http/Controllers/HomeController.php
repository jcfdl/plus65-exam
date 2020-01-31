<?php

namespace App\Http\Controllers;
use App\Draw;
use App\DrawMember;
use App\DrawGroup;
use App\DrawPrize;
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

  public function register(Request $request) {
    print_r('yes'); exit();
  }

  public function check(Request $request) {

  }
}
