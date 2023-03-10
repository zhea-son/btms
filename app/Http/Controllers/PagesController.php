<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use App\Models\User;
use App\Models\Route;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PagesController extends Controller
{
    public function home(){
        $buses = Bus::count();
        $users = User::count();
        $trips = 0;
        $places = Route::count(['origin']);
        return view('pages.home', compact(['buses','users','places','trips']));
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
