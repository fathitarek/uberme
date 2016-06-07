<?php

namespace App\Http\Controllers;

use App\Trip;
use Validator;
use DB;
use Illuminate\Http\Request;
use App\Http\Requests;

class TripController extends Controller {
 

 public function trip_day(Request $request) {

 	$area_from=$request['pickup_location'];
 	$area_to=$request['destination_location'];

        $trip = DB::select("select pickup_location ,  destnation_location from trip where pickup_loation lik %".$area_from."% or destnation_location like %".$area_to."%" ); 	
        return view ('trips.trip_day',['trip' => $trip]);
}
 
 	
}
