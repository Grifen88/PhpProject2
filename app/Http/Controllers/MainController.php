<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MainController extends Controller
{
    public function main() {
    	return view('pages.index')->with('title', 'Welcome');
    	//return 'test';
    }

    public function search() {
    	return view('pages.search');
    }

    //to move to a cruise controller
    //to seed database

    public function search_result() {
    	$cruises = Cruises::all();

    	return view('partial.partial_search');
    }
}
