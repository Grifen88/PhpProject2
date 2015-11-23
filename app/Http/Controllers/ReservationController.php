<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Cruise;
use App\Passenger;
use App\Cabin;
use App\Reservation;
use App\Ship;
use App\Port;
use App\Cruise_Cabin_Type;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customer = \Auth::User();

        $reservations = Reservation::where('customer_id', $customer->id)->get();
        $cruises = collect([]);
        foreach($reservations as $reservation) {
            $cruises->push(Cruise::where('id', $reservation->cruise_id)->first());
        }
        $ports = Port::all();


        return view('pages.reservation', compact('customer', 'reservations', 'cruises', 'ports'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $cruises = Cruise::all();

        return view('pages.reservation_create')->with('cruises', $cruises);
    }

    public function create_helper_cabin() {
        $searchterm = Input::get('cruiseid');

        $cruise = Cruise::findOrFail($searchterm);
        $ship = Ship::findOrFail($cruise->ship_id);
        $cabins = Cabin::where('ship_id', $ship->id)->get();

        return view('partial.partial_cabin')->with('cabins', $cabins);    
    }

    public function create_helper_passenger() {
        return view('partial.partial_passenger');    
    }

    public function create_helper_confirmation() {
        $cruiseid = Input::get('cruiseid');
        $cabinid = Input::get('cabinid');

        $cruise = Cruise::findOrFail($cruiseid);
        $ship = Ship::findOrFail($cruise->ship_id);
        $cabin = Cabin::where('id', $cabinid)->first();
        $port = Port::all();
        $cabin_type = Cruise_Cabin_Type::where('cruise_id', $cruise->id)->get();

        return view('partial.partial_confirmation', compact('cruise', 'ship', 'cabin', 'port', 'cabin_type'));  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = \Request::all();

        $passenger = new Passenger;
        $passenger->title = $input['passenger_title'];
        $passenger->name = $input['passenger_name'];
        $passenger->sex = $input['passenger_sex'];
        $passenger->age = $input['passenger_age'];
        $passenger->address_line_1 = $input['passenger_address1'];
        $passenger->address_line_2 = $input['passenger_address2'];
        $passenger->address_line_3 = $input['passenger_address3'];
        $passenger->state = $input['passenger_state'];
        $passenger->country = $input['passenger_country'];
        $passenger->occupation = $input['passenger_occupation'];
        $passenger->cabin_id = $input['cabin_form'];

        $passenger->save();

        $reservation = new Reservation;
        $reservation->cruise_id = $input['cruise_form'];
        $reservation->cabin_id = $input['cabin_form'];
        $reservation->customer_id = \Auth::User()->id;
        $reservation->save();

        $cabin = Cabin::where('id', $input['cabin_form'])->first();
        $cabin->occupied = false;
        $cabin->save();

        return view('pages.index')->with('title', 'Welcome');;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
