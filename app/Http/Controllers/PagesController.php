<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
class PagesController extends Controller
{
    public function root()
    {
		
		
		
       return view('pages.root');
    }
    public function index()
    {
    	return view('pages.root');
    }
}
