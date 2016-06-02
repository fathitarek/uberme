<?php

namespace App\Http\Controllers;

use App\Members;
use Validator;
use DB;
use Illuminate\Http\Request;
use App\Http\Requests;

class MemberController extends Controller {

    public function index() {
        $members = DB::table('members')->get();

        return view('member.show', ['members' => $members]);
    }

    public function create() {
        return view('member.create');
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [

                    'name' => 'required|max:20|min:3',
                    'phone_number' => 'required|integer|min:9',
                    'email' => 'email|required'
        ]);
        if ($validator->fails()) {
            return redirect('create')
                            ->withInput()->withErrors($validator);
        } else {
            $member = new Members();
            $member->name = $request['name'];
            $member->phone_number = $request['phone_number'];
            $member->email = $request['email'];
            $member->save();
            return redirect()->route('members');
        }
    }

    public function updateStatus_ws(Request $request) {
        $id = $request['user_id'];
        $status = $request['status'];
        unset($request['user_id']);
        $output = array();
        //UPDATE `members` set `status`=0 WHERE user_id=1 
        $member = DB::table('members')
                ->where('user_id', $id)
                ->update(['status' => $status]);
                //->update($request->all());
        if ($member==1) {
            $output['message'] = 'updated-status';
            //$output['member'] = $member;
        } else {
            $output['message'] = ' not updated status';
        }
    }

}
