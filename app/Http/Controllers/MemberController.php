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

     public function create(Request $request) {
        $output=array();
        $member = new Members;

        $member->name = $request->name;
        $member->phone_number = $request->phone_number;
        $member->email = $request->email;

      if ($member->save()) {
        
        $output['message']='created ';


      }else{
        $output['message']=' not created ';
      }

      return $output;
    }


    public function update(Request $request)
    {

        $id = $request->user_id;
        $name = $request->name;
        $phone_number = $request->phone_number;
        $email= $request->email;

     //   $status = $request['status'];
        //unset($request['user_id']);
        $output = array();
        //UPDATE `members` set `status`=0 WHERE user_id=1 
       /* $member = DB::table('members')
                ->where('user_id', $id)
           //     ->update($request->all());
                ->update($request->all());*/
                $member= Members::find($id);
                $member->phone_number = $request->phone_number;
                $member->email=$request->email;
                $member->save();

                
                //return response()->json($member);

//$member=DB::statement("UPDATE members SET name ='".$name."' ,phone_number = ".$phone_number.",email ='".$email ."' where user_id=".$id); 

        if($member) {
            $output['message'] = 'updated-status';
            //$output['member'] = $member;
        } else {
            $output['message'] = ' not updated status';
        }
        return response()->json($output);       
    }

   


    public function show(Request $request) {
        $id=$request['user_id'];
        unset($request['id']);

        $output=array();
//$member = new Members;
        $member=DB::select('SELECT * FROM members WHERE user_id=' . $id);

        //$member= DB::table('members')
        //    ->where('user_id', $id);
        
        //$output['member']=$member;
         if ($member) {
        
        $output['message']='shown ';
       //   $output['member']=$member;

       }else{
        $output['message']=' not shown ';
       }

      //return $output;
      return $member;

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
        return $member;
    }

}
