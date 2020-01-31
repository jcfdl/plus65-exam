<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DrawMember extends Model
{
  protected $fillable = [
  	'name', 'draw_id', 'number1', 'number2', 'number3', 'number4', 'number5', 'total'
  ];

  public function draw() {
  	return $this->belongsTo('App\Draw');
  }
}
