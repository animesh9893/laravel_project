<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\User;
use App\Models\device;
use App\Models\exercise;
use App\Models\exerciseList;
use Session;

class DashboardController extends Controller
{
    function getDashboard(){
        $now = Carbon::now()->toDateTimeString();
        $yesterday = Carbon::now()->subDay()->toDateString();
        $week = Carbon::now()->subWeek()->toDateString();
    
        // getting user details
        $email = Session::get('email');
        $resp = User::where('email','=',$email)->first();
        $details = [];
        $details["email"] = $resp->email;        
        $details["name"] = $resp->name;        
        $details["id"] = $resp->id;        
        $details["mobile"] = $resp->mobile;        

        // getting device data
        $resp_2 = device::where('user_id','=',$resp->id)->get();

        // exercise list
        $resp_3 = exerciseList::all();

        // daily report
        $daily = exercise::where('started','>=',$yesterday)->where('user_id','=',$resp->id)->get();
        // var_dump($daily);
        // weekly
        $weekly = exercise::where('started',">=",$week)->where('user_id','=',$resp->id)->get();


        return view('dashboard',["details"=>$details,"device"=>$resp_2,"exerciseList"=>$resp_3,"daily"=>$daily,"week"=>$weekly]);
    }
}
