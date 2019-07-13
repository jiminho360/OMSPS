<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class AuthenticationController extends Controller
{
    public function loginIndex()
    {
        $errorMsg = "";
        return view('Login',compact('errorMsg'));
    }

    public function Login()
    {
        
        $data = Input::all();

//        dd($data);

        if (Auth::attempt(['email' => $data['email'], 'password' => $data['password']])) {
//            dd(Auth::user()->first_name);
            return redirect()->action('AuthenticationController@homepage');
        }else{
            $errorMsg = "Wrong UserName or Password";
            return view('Login', compact('errorMsg'));
        }

    }

    public function homepage()
    {
        return view('Dashboard.Dashboard');
    }

}
