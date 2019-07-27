<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewController extends Controller
{
    function login(){
        return view('auth/login');
    }

    function dashboard(){
        return view('home');
    }
    function inscription(){
        return view ('inscription');
    }
    function maps(){
        return view('maps');
    }
    function notifications(){
        return view('notifications');
    }
    function table(){
        return view('table');
    }
    function user(){
        return view('user');
    }
    function forgot_password(){
        return view('forgot_password');
    }
}
