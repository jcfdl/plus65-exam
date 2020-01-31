<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DrawGroup extends Model
{
  protected $fillable = [
  	'draw_id', 'draw_member_id', 'draw_prize_id', 'number'
  ];

  public function draw() {
  	return $this->belongsTo('App\Draw');
  }

  public function drawMember() {
  	return $this->belongsTo('App\DrawMember');
  }

  public function drawPrize() {
  	return $this->belongsTo('App\DrawPrize');
  }

}
