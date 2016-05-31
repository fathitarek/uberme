<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

use App\Http\Requests;

class MemberController extends Controller
{
    // 
    public function index() {
     $members = DB::table('members')->get();

        return view('member.show', ['members' => $members]);   
    }
}
