<?php

namespace App\Http\Controllers;
use App\ User_invitation_trips;

use DB;
use Illuminate\Http\Request;
use App\Http\Requests;

class User_invitation_tripController extends Controller {

    public function index() {
//trip.pickup_location ,trip.destnation_location ,trip.trip_time 
        $user_invitation_trip = \DB::select('
SELECT trip.pickup_location ,trip.destnation_location ,trip.trip_time , members.name FROM `user_invitation_trip` INNER JOIN`trip` ON trip.product_id=user_invitation_trip.product_id INNER JOIN members ON members.uuid=user_invitation_trip.uuid WHERE tripproduct_id=1');
        return view('user_invitation_trip.show', ['user_invitation_trip' => $user_invitation_trip]);
    }

    public function history() {

        $user_invitation_trip = \DB::select('
SELECT trip.pickup_location ,trip.destnation_location ,trip.trip_time , members.name FROM `user_invitation_trip` INNER JOIN`trip` ON trip.product_id=user_invitation_trip.product_id INNER JOIN members ON members.uuidid=user_invitation_trip.uuid WHERE members.uuid=1');
        return view('user_invitation_trip.history', ['user_invitation_trip' => $user_invitation_trip]);
    }

//web service
    public function show_ws(Request $request) {
        $id = $request['user_invitation_trip_id'];
        $product_id = $request['product_id'];
        unset($request['user_invitation_trip_id']);
        $output = array();
        $user_invitation_trip = \DB::select('
SELECT trip.pickup_location ,trip.destnation_location ,trip.trip_time , members.name FROM `user_invitation_trip` INNER JOIN`trip` ON trip.product_id=user_invitation_trip.product_id INNER JOIN members ON members.uuid=user_invitation_trip.uuid WHERE trip.product_id=' . "'$product_id'");
        if ($user_invitation_trip) {
            $output['message'] = 'show_ws';
        } else {
            $output['message'] = 'Not_show_ws';
        }
        //return $user_invitation_trip;
        return response()->json($user_invitation_trip);
    }

    public function history_ws(Request $request) {
        $id = $request['user_invitation_trip_id'];
        unset($request['user_invitation_trip_id']);
        $uuid = $request['uuid'];
        $user_invitation_trip = \DB::select('
SELECT trip.* , members.name FROM `user_invitation_trip` INNER JOIN`trip` ON trip.product_id=user_invitation_trip.product_id INNER JOIN members ON members.uuid=user_invitation_trip.uuid WHERE members.uuid=' ."'$uuid'");
        if ($user_invitation_trip) {
            $output['message'] = 'history_ws';
        } else {
            $output['message'] = 'Not_history_ws';
        }
        //return $user_invitation_trip;
        return response()->json($user_invitation_trip);
    }

    public function create_ws(Request $request) {
        $output = array();
        $user_invitation_trip = new User_invitation_trips;
        $user_invitation_trip->invitation_id = $request->invitation_id;
        $user_invitation_trip->product_id = $request-product_id;
        $user_invitation_trip->uuid = $request->uuid;

        if ($user_invitation_trip->save()) {

            $output['message'] = 'created';
        } else {
            $output['message'] = 'not created ';
        }

        return $user_invitation_trip;
    }

}
