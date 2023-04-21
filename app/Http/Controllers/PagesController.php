<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Bus;
use App\Models\User;
use App\Models\Route;
use App\Models\Schedule;
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
         $pageTitle = "Today's Buses";
        $live_buses = Schedule::whereDate('date', Carbon::now()->format('Y-m-d'))->where('completed',false);
        return view('buses.index', [
            'schedules' => $live_buses->filter(request(['place','type']))->Simplepaginate(9),
            'pageTitle' => $pageTitle 
        ]);
    }
}
