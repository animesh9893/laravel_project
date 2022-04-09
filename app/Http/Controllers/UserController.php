<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;
use Session;

class UserController extends Controller
{
    //
    function getData(){
        return User::all();
    }

    function validateCred($email,$password,$auth_token){
        $user = User::where('email',"=",$email)->first();
        if($user==NULL){
            return 500; // user not found
        }
        $user_pass = Crypt::decryptString($user["password"]);
        if($user_pass!=$password){
            return 400; // password not match
        }
        if($auth_token!=$user["auth_token"]){
            return 300; // auth_token not match
        }
        return 200;
    }

    function changeAuthToken($email,$password){
        $status = $this->validateCred($email,$password,"");
        if($status!=300){
            return 500; // email,pass is wrong
        }
        // email and password is correct
        $ans = User::where('email',"=",$email)->first();
        $id = (int)$ans["id"]; // extract id from database
        $user = User::find($id); // find user object cursor from db
        $new_auth = Str::random(40); // new auth token
        $user->auth_token =$new_auth; // assign new token
        $user->update(); // updating to db
        return $new_auth;
    }

    function setSession($email,$name,$password,$auth_token){
        Session::put('name',$name); // setting session
        Session::put('email',$email);
        Session::put('password',$password);
        Session::put('auth_token',$auth_token);
        Session::put('logged',true);
        $id = $this->getDetails($email)["id"];
        Session::put('id',$id);
    }

    function logout(Request $req){
        $req->session()->flush();
        return redirect('/');
    }

    function loginGET(){
        // checking if session has values or not
        $email = Session::get('email');
        $name = Session::get('name');
        $password = Session::get('password');
        $auth_token = Session::get('auth_token');

        // if session contain values
        if($email!=NULL){
            // checking if cred are valid
            $ans = $this->validateCred($email,$password,$auth_token);
            if($ans==200 or $ans==300){ // only if email and pass are good;
                $new_token = $this->changeAuthToken($email,$password); // change auth token
                $this->setSession($email,$name,$password,$new_token); // changing session details
                return redirect('dashboard'); 
            }
        }
        // if session is empty then redirect to login page
        return view('login'); 
    }

    function getDetails($email){
        $ans = User::where('email','=',$email)->first();
        $created = $ans["created_at"];
        $lastlog = $ans["last_logged"];
        $mobile = $ans["mobile"];
        $name  = $ans["name"];
        $id = $ans["id"];
        return ["name"=>$name,"created_at"=>$created,"last_logged"=>$lastlog,"mobile"=>$mobile,"email"=>$email,"id"=>$id];
    }

    function loginPOST(Request $req){
        $email = $req->email;
        $password = $req->password;
        $ans = $this->validateCred($email,$password,"");
        if($ans==200 or $ans==300){
            $name = $this->getDetails($email)["name"];
            $new_token = $this->changeAuthToken($email,$password); // change auth token
            $this->setSession($email,$name,$password,$new_token); // changing session details
            return redirect('dashboard'); 
        }
        // if session is empty then redirect to login page
        return view('login'); 
    }

    function createUser($email,$name,$password,$mobile){
        $user = new User;
        $user->name = $name;
        $user->email = $email;
        $user->password = Crypt::encryptString($password);
        $user->mobile = $mobile;
        $user->auth_token = Str::random(40);
        $user->save();
        $this->setSession($email,$name,$password,$user->auth_token);
    }


    function signupPOST(Request $req){
        $email = $req->email;
        $password = $req->password;
        $name = $req->name;
        $ans = $this->validateCred($email,$password,"");
        // if email,password match redirect to dashobard
        if($ans==200 or $ans==300){
            $this->setSession($email,$name,$password,"");
            return redirect('login');
        }
        // user exist and password not match
        if($ans==400){
            return redirect('signup');
        }
        $this->createUser($email,$name,$password,$req->mobile);
        return redirect('login');
    }
}

