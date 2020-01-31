<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdministratorsController extends Controller
{
	public function __construct() {

	}

	public function index() {
		$title = 'Lucky Draw';
		return view('admin.index', compact('title'));
	}
}
