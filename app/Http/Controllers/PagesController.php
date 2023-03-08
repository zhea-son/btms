<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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

    public function live(){
        return view('pages.live');
    }

    public function buses(){
        return view('pages.buses');
    }
}
