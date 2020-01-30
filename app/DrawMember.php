<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DrawMember extends Model
{
  protected $fillable = [
  	'name', 'number1', 'number2', 'number3', 'number4', 'number5', 'total'
  ];
}
