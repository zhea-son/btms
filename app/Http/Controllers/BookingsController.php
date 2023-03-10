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

        $route = "From " . $from . " to " . $to;

        foreach ($schedules as $schedule) {
            $totalSeats = $schedule->bus->seats;
            $bookedSeats = $schedule->bookings->sum('seats');
            if($bookedSeats == $totalSeats){ $schedule->availableSeats = "No Seats Available"; }
            else{
            $availableSeats = $totalSeats - $bookedSeats;
            $schedule->availableSeats = $availableSeats; }
        }


        return view('bookings.show', compact('schedules','route','date'));

    }
    
    // public function search(){
    //     $buses = Bus::all();
    //     return view('buses.index');
    // }

    public function booking(Request $request){
        $schedule = $request['schedule_id'];
        $availableSeats = $request['available_seats'];
        return view('bookings.booking', ['schedule_id' => $request->input('schedule_id'),
                                            'available_seats' => $availableSeats
    ]);
    }

    public function store(Request $request){
        $formFields = $request->validate([
            'seats' => 'required'
        ]);

        $formFields['schedule_id'] = $request['schedule_id'];
        $available_seats = $request['available_seats'];
        $formFields['user_id'] = auth()->user()->id;

        if($formFields['seats'] <= $available_seats){
            Booking::create($formFields);
            return redirect('/my_bookings')->with('message', "Booking done successfully!");
        }
        else{
            return response()->json(['message' => 'entered seats not available'], 400);
        }
    }

    public function booking_details(){
        return view('bookings.booking_details');
    }

    public function my_bookings(){
        $bookings = Booking::where('user_id',auth()->user()->id)->with(['schedule'])->get();
        
        return view('bookings.my_bookings', compact('bookings'));
    }

    public function destroy(Booking $booking)
    {
        $booking->delete();
        return back()->with('message', 'Booking deleted successfully!');
    }
}
