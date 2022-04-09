<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\exercise;
use App\Models\device;
use App\Models\exerciseList;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;
use Session;

class ExerciseController extends Controller
{
    // return all exercise where user id is same
    function getExerciseData($user_id){
        $ans = exercise::where('user_id','=',$user_id)->get();
        return $ans;
    }


    function addExerciseList(Request $req){
        $e = new exerciseList;
        $e->name = $req->name;
        $e->description = $req->description;
        $e->save();
        return redirect('exercise');
    }

    // when user create new exercise 
    function newExerciseGET(Request $req){
        // user fill these feilds
        $name = $req->name;
        $device_id = $req->device;
        $count = $req->count;
        $reps = $req->reps;
        $weight = $req->weight;
        $calories = $req->calories; 
        $note = $req->note;
        $user_id = Session::get('id');
        // is user id is null request from email
        if($user_id==NULL){
            $email = Session::get('email');
            $user_id = User::where('email',"=",$email)->first()["id"];
            Session::put("id",$user_id);
        }
        //creating exercise object for database;
        $e = new exercise;
        $e->name = $name;
        $e->device_id = $device_id;
        $e->user_id = $user_id;
        $e->count = $count;
        $e->reps = $reps;
        $e->weight = $weight;
        $e->calorie = $calories;
        $e->note = $note;

        $e->save(); // saving object in db

        return redirect('exercise'); //rediret to exercise page
    }

    // when user land on "/exercise" page
    function exerciseGET(Request $req){
        $user_id = Session::get('id'); // getting user id from session
        if($user_id==NULL){
            $email = Session::get('email');
            $user_id = User::where('email',"=",$email)->first()["id"];
            Session::put("id",$user_id);
        }

        // getting all the devices linked with user id
        $devices = device::where('user_id','=',$user_id)->get();
        $div = [];
        // formating devices
        foreach ($devices as $key => $value) {
            $div[$devices[$key]->device_id] = $devices[$key]->name;
        }

        // getting previous exercise data
        $ans = $this->getExerciseData($user_id);
        $arr = []; // 2d array stores data
        foreach($ans as $key => $val){
            $data = [];
            $data["note"]=$val->note;
            $data["name"]=$val->name;
            $data["device_id"]=$val->device_id;
            $data["device_name"]= $div[$val->device_id];
            $data["count"] = $val->count;
            $data["reps"] = $val->reps;
            $data["weight"] = $val->weight;
            $data["calorie"] = $val->calorie;
            $data["id"] = $val->id;
            $data["timestamp"] = $val->started;
            array_push($arr, $data);
        }

        //getting all exercise list
        $exe_list = exerciseList::all();

        return view('exercise',["data"=>$arr,"device"=>$div,'exe_list'=>$exe_list]);
    }

    function deleteExercise(Request $req){
        exercise::where('id','=',$req->delete)->delete();
        return redirect('exercise');
    }

    function editExercisePOST(Request $req){
        // user fill these feilds
        $name = $req->name;
        $id = $req->id;
        $device_id = $req->device;
        $count = $req->count;
        $reps = $req->reps;
        $weight = $req->weight;
        $calories = $req->calories; 
        $note = $req->note;
        $user_id = Session::get('id');
        // is user id is null request from email
        if($user_id==NULL){
            $email = Session::get('email');
            $user_id = User::where('email',"=",$email)->first()["id"];
            Session::put("id",$user_id);
        }

        $e = exercise::find($id);

        $e->name = $name;
        $e->device_id = $device_id;
        $e->user_id = $user_id;
        $e->count = $count;
        $e->reps = $reps;
        $e->weight = $weight;
        $e->calorie = $calories;
        $e->note = $note;

        $e->update();

        return redirect('exercise');
    }

    function editExercise(Request $req){
        $user_id = Session::get('id'); // getting user id from session
        if($user_id==NULL){
            $email = Session::get('email');
            $user_id = User::where('email',"=",$email)->first()["id"];
            Session::put("id",$user_id);
        }

        // getting all the devices linked with user id
        $devices = device::where('user_id','=',$user_id)->get();
        $div = [];
        // formating devices
        foreach ($devices as $key => $value) {
            $div[$devices[$key]->device_id] = $devices[$key]->name;
        }

        $exe_list = exerciseList::all();
        $id = $req->edit;
        $data = exercise::where('id','=',$id)->first();
        return view('editExercise',["data"=>$data,"device"=>$div,'exe_list'=>$exe_list]);
    }
}






