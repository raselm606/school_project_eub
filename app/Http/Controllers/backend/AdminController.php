<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function login(){
        return view('backend.pages.login');
    }
    public function signup(){
        return view('backend.pages.register');
    }

    public function forgetPass(){
        return view('backend.pages.forgot-password');
    }

}
