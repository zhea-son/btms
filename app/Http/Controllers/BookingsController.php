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
        $fare = $request['fare'];
        $availableSeats = $request['available_seats'];
        return view('bookings.booking', ['schedule_id' => $request->input('schedule_id'),
                                        'fare' => $request->input('fare'),
                                            'available_seats' => $availableSeats
    ]);
    }

    public function store(Request $request){
        $formFields = $request->validate([
            'seats' => 'required'
        ]);


        $fare = $request['fare'];
        $formFields['schedule_id'] = $request['schedule_id'];
        $available_seats = $request['available_seats'];
        $formFields['user_id'] = auth()->user()->id;

        if($formFields['seats'] <= $available_seats){
            $formFields['amount'] = $formFields['seats'] * $fare; 
            Booking::create($formFields);
            return redirect('/user/my_bookings')->with('message', "Booking done successfully!");
        }
        else{
            return response()->json(['message' => 'entered seats not available'], 400);
        }
    }

    public function booking_details(){
        return view('bookings.booking_details');
    }

    public function my_bookings(){
        $bookings = Booking::where('user_id',auth()->user()->id)->whereHas('schedule', function ($query){
            $query->where('completed', false);
        })->with(['schedule'])->get();

        foreach($bookings as $booking){
            $today = Carbon::today();
            $daysRemaining = $today->diffInDays($booking->schedule->date, false);
            $booking->status = $daysRemaining . " Days Remaining";
        }

        // dd($booking->status);
        
        return view('bookings.my_bookings', compact('bookings'));
    }

    public function my_history(){
        $bookings = Booking::where('user_id',auth()->user()->id)->whereHas('schedule', function ($query){
            $query->where('completed', true);
        })->with(['schedule'])->get();

        foreach($bookings as $booking){
            $booking->arrtime = Carbon::createFromFormat('Y-m-d H:i:s', $booking->schedule->completed_at)->format('H:i:s');
            $booking->arrdate = Carbon::createFromFormat('Y-m-d H:i:s', $booking->schedule->completed_at)->format('Y-m-d');
        }
        
        return view('bookings.my_history', compact('bookings'));
    }

    public function destroy(Booking $booking)
    {
        $booking->delete();
        return back()->with('message', 'Booking deleted successfully!');
    }

    public function pay_on_bus(Request $request){
        $booking = Booking::findOrFail($request['booking_id']);
        $booking->payment_unique_id = "Hand Cash";
        $booking->save();

        return back();
    }
}
