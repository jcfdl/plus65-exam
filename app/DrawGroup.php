<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DrawGroup extends Model
{
  protected $fillable = [
  	'draw_id', 'draw_member_id', 'draw_prize_id'
  ];

}
