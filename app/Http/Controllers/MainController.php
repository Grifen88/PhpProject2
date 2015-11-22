<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Cruise;
use App\Port;

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
        $searchterm = Input::get('searchterm');

    	$cruises = Cruise::where('name', 'LIKE', '%'.$searchterm.'%')->get(); 
        //$cruises = Cruise::first(); 

        $port = Port::all();

    	return view('partial.partial_search', ['cruises' => $cruises, 'port' => $port]);
    }
}
