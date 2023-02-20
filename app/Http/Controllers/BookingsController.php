<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use App\Models\Route;
use App\Models\Schedule;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingsController extends Controller
{
    public function show_search(){
        
        return view('bookings.search');
    }

    public function show(Request $request){
        $formFields = $request->validate([
            'from' => 'required',
            'to' => 'required',
            'date' => 'required',
        ]);

        $from = $formFields['from'];
        $to = $formFields['to'];
        $date = $formFields['date'];

        $schedules = Schedule::whereHas('route', function ($query) use ($from, $to) {
            $query->where('origin', $from)
                  ->where('destination', $to);
        })->whereDate('date', $date)->get();

        return view('bookings.show', compact('schedules'));

    }
    
    // public function search(){
    //     $buses = Bus::all();
    //     return view('buses.index');
    // }

    public function booking(Request $request){
        $schedule = $request['schedule_id'];
        return view('bookings.booking', ['schedule_id' => $request->input('schedule_id')]);
    }

    public function store(Request $request){
        $formFields = $request->validate([
            'seats' => 'required'
        ]);

        $formFields['schedule_id'] = $request['schedule_id'];
        Booking::create($formFields);

        
        return redirect('/my_bookings')->with('message', "Booking done successfully!");
    }

    public function booking_details(){
        return view('bookings.booking_details');
    }

    public function my_bookings(){
        $bookings = Booking::all();
        return view('bookings.my_bookings', compact('bookings'));
    }
}
