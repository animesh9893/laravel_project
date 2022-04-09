<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Models\device;
use App\Models\User;
use Illuminate\Support\Str;

class deviceController extends Controller
{
    function deviceGET(Request $req){
        $user_id = Session::get('id');
        if($user_id==NULL){
            $email = Session::get('email');
            $user_id = User::where('email',"=",$email)->first()["id"];
            Session::put("id",$user_id);
        }
        $ans = device::where('user_id','=',$user_id)->get();
        // var_dump($ans);
        return view('device',['device_data'=>$ans]);
    }

    function createDevice(Request $req){
        $device_name = $req->device_name;
        $description = $req->description;
        $user_id = Session::get('id');
        if($user_id==NULL){
            $email = Session::get('email');
            $user_id = User::where('email',"=",$email)->first()["id"];
            Session::put("id",$user_id);
        }
        $d = new device;
        $d->name = $device_name;
        $d->description = $description;
        $new_auth = Str::random(40); // new auth token
        $d->user_id = $user_id;
        $d->device_auth_token = $new_auth;
        $d->save();
        return redirect('device');
    }
}
