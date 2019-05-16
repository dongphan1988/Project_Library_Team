<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function home(){
        return view('home.index');
    }
    public function login(){
        return view('login.index');
    }
}
