<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use App\Models\Route;
use App\Models\Schedule;
use App\Models\Booking;
use Illuminate\Http\Request;
use Carbon\Carbon;

class BookingsController extends Controller
{
    public function show_search(){
        $from = Route::pluck('origin','origin');
        $to = Route::pluck('destination','destination');
        return view('bookings.search',compact('from','to'));
    }

    public function search(Request $request){
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
        $formFields['user_id'] = auth()->user()->id;
        Booking::create($formFields);

        
        return redirect('/my_bookings')->with('message', "Booking done successfully!");
    }

    public function booking_details(){
        return view('bookings.booking_details');
    }

    public function my_bookings(){
        $bookings = Booking::where('user_id',auth()->user()->id)->with(['schedule'])->get();
        
        return view('bookings.my_bookings', compact('bookings'));
    }
}
