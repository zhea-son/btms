<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Carbon\Carbon;
use App\Models\Bus;
use App\Models\Route;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SchedulesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('schedules.index', [
            // 'routes' => Bus::latest()->filter(request(['to','from','type']))->Simplepaginate(6)
            'schedules' => Schedule::with(['bus','route'])->latest()->filter(request(['place','type']))->Simplepaginate(9)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $buses = Auth::guard('company')->user()->buses;
        $routes = Auth::guard('company')->user()->routes;

        return view('schedules.create',compact('buses','routes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'date' => 'required',
            'departure_time' => 'required',
            'fare' => 'required',
            'bus_id' => 'required',
            'route_id' => 'required', 
            'estimated_time' => 'required',
        ]);
        foreach ($formFields as &$value) {
            $value = strip_tags($value);
        }
        $path = Route::where('id', $formFields['route_id'])->first();
        $formFields['company_id'] = Auth::guard('company')->user()->id;

        $schedules = Schedule::where('bus_id', $formFields['bus_id'])
                                ->where('date', $formFields['date'])
                                ->get();
        if(count($schedules) == 1){
            $prev_schedule = $schedules->first();
        }
        elseif(count($schedules) > 1){
            foreach($schedules as $sch){
                if($sch->route->destination == $path->origin){
                    $prev_schedule = $sch;
                }
            }
        }

        if(isset($prev_schedule)){
            $time = explode(':',$prev_schedule->departure_time);
            $newHours = (intval($time[0]) + intval($prev_schedule->estimated_time)) % 24; 
            $min_start_time =  sprintf("%02d:%02d", strval($newHours), $time[1]);
            $min_time = strtotime($min_start_time) - strtotime('00:00');
            $dept_time = strtotime($formFields['departure_time']) - strtotime('00:00');
        }
        if(isset($prev_schedule) && !$prev_schedule->completed){
            if($min_time > $dept_time){
                return response()->json(['message' => 'Bus Schedule can only be started after ' . $min_start_time . '.']);
            }else{
                Schedule::create($formFields);
                return redirect('/company/schedules')->with('message', "Schedule created successfully!");
            }
        }
    
        else{
            Schedule::create($formFields);
            return redirect('/company/schedules')->with('message', "Schedule created successfully!");
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Schedule $schedule)
    {
        $buses = Bus::all();
        $routes = Route::all();
        return view('schedules.edit' ,['schedule' => $schedule,
            'buses','routes'
    ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Schedule $schedule)
    {
        $formFields = $request->validate([
            'date' => 'required',
            'departure_time' => 'required',
            'fare' => 'required',
            'estimated_time' => 'required',
        ]);
        foreach ($formFields as &$value) {
            $value = strip_tags($value);
        }
        $schedule->update($formFields);

        return redirect('/company/schedules')->with('message', "Schedule updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Schedule $schedule)
    {
        $schedule->delete();
        return back()->with('message', 'Schedule deleted successfully!');
    }

    public function live(){
        $today = Carbon::today();
        $schedules = Schedule::whereDate('date', $today)->get();
        return view('schedules.live', compact('schedules'));
    }

    public function completed($id)
{
    $schedule = Schedule::findOrFail($id);
    $schedule->completed = true;
    $schedule->completed_at = now(); // Update completed_at to the current timestamp
    $bookedSeats = $schedule->bookings->sum('seats');
    $schedule->no_of_passengers = $bookedSeats; // Update no_of_passengers to bookedSeats
    $schedule->income = $bookedSeats * $schedule->fare; // Update income
    $schedule->save();

    $bookings = $schedule->bookings->where('paid', false);
    foreach($bookings as $booking){
        $booking->paid = true;
        $booking->save();
    }

    return redirect()->route('company.trips');
}

public function schedule_info(Schedule $schedule){
    $via = $schedule->route->via;
    $vial = explode(',',$via);
    array_unshift($vial, $schedule->route->origin);
    array_push($vial, $schedule->route->destination);
    $len = count($vial);
    for($i=0; $i<$len; $i++){
        $vial[$i] = ltrim($vial[$i]);
    }
    $count = -1;
    // dd($vial);
    return view('schedules.scheduleinfo', ['schedule'=> $schedule,
                                            'vial' => $vial,
                                            'count' => $count,
]);
}

public function update_status($id, Request $request){
    $schedule = Schedule::with('bus', 'route')->findOrFail($id);
    $viaarray = explode(',', $schedule->route->via);
    array_unshift($viaarray, $schedule->route->origin);
    array_push($viaarray, $schedule->route->destination);
    $len = count($viaarray);
    for($i=0; $i<$len; $i++){
        $viaarray[$i] = ltrim($viaarray[$i]);
    }
    $count = array_search(($request['status']), $viaarray);
    $schedule->status = $request['status'];
    $schedule->save();
    return view('schedules.scheduleinfo',  ['schedule'=> $schedule,
                                            'vial' => $viaarray,
                                            'count' => $count,
    ]);
}

public function view_bookings($id){
    $bookings = Booking::where('schedule_id', $id)->with('user','schedule')->get();
    $seats_booked = $bookings->sum('seats');
    $schedule = Schedule::where('id',$id)->with('bus')->first();
    $total_seats = $schedule->bus->seats;
    // dd($total_seats);
    return view('schedules.view_bookings',compact('bookings','schedule','seats_booked','total_seats'));
}

}
