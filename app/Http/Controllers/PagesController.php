<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home(){
        return view('pages.home');
    }

    public function about(){
        return view('pages.about');
    }

    public function sign_up(){
        return view('pages.sign_up');
    }

    public function login(){
        return view('pages.login');
    }

    public function login_comp(){
        return view('pages.login_comp');
    }

    public function live(){
        return view('pages.live');
    }

    public function buses(){
        return view('pages.buses');
    }
}
