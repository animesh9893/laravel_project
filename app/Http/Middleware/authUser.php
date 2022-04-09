<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;
use Session;

class authUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */

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

    public function handle(Request $request, Closure $next)
    {
        $email = Session::get('email');
        $name = Session::get('name');
        $password = Session::get('password');
        $auth_token = Session::get('auth_token');

        if($email==NULL or $password==NULL or $auth_token==NULL){
            return redirect('login');
        }

        $ans = $this->validateCred($email,$password,$auth_token);
        if($ans!=200){
            return redirect('login');
        }
        return $next($request);
    }
}
