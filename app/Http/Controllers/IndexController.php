<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
	//选择当前
    public function index()
    {
		return view('index.page');
    }
}
