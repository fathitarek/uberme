<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Http\Requests;

class User_invitation_tripController extends Controller {

    public function index() {
        
        $user_invitation_trip = \DB::select('
SELECT trip.pickup_location ,trip.destnation_location ,trip.trip_time , members.name FROM `user_invitation_trip` INNER JOIN`trip` ON trip.trip_id=user_invitation_trip.trip_id INNER JOIN members ON members.user_id=user_invitation_trip.user_id WHERE trip.trip_id=1');
        return view('user_invitation_trip.show', ['user_invitation_trip' => $user_invitation_trip]);
    }
 public function history() {
        
        $user_invitation_trip = \DB::select('
SELECT trip.pickup_location ,trip.destnation_location ,trip.trip_time , members.name FROM `user_invitation_trip` INNER JOIN`trip` ON trip.trip_id=user_invitation_trip.trip_id INNER JOIN members ON members.user_id=user_invitation_trip.user_id WHERE members.user_id=1');
        return view('user_invitation_trip.history', ['user_invitation_trip' => $user_invitation_trip]);
    }
}
