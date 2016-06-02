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

//web service
    public function show_ws(Request $request) {
        $id = $request['user_invitation_trip_id'];
        $trip_id = $request['trip_id'];
        unset($request['user_invitation_trip_id']);
        $output = array();
        $user_invitation_trip = \DB::select('
SELECT trip.pickup_location ,trip.destnation_location ,trip.trip_time , members.name FROM `user_invitation_trip` INNER JOIN`trip` ON trip.trip_id=user_invitation_trip.trip_id INNER JOIN members ON members.user_id=user_invitation_trip.user_id WHERE trip.trip_id=' . $trip_id);
        if ($user_invitation_trip) {
            $output['message'] = 'show_ws';
        } else {
            $output['message'] = 'Not_show_ws';
        }
        return $output;
    }

    public function history_ws(Request $request) {
        $id = $request['user_invitation_trip_id'];
        unset($request['user_invitation_trip_id']);
        $user_id = $request['user_id'];
        $user_invitation_trip = \DB::select('
SELECT trip.pickup_location ,trip.destnation_location ,trip.trip_time , members.name FROM `user_invitation_trip` INNER JOIN`trip` ON trip.trip_id=user_invitation_trip.trip_id INNER JOIN members ON members.user_id=user_invitation_trip.user_id WHERE members.user_id='.$user_id);
        if ($user_invitation_trip) {
            $output['message'] = 'history_ws';
        } else {
            $output['message'] = 'Not_history_ws';
        }
        return $output;
    }

}
