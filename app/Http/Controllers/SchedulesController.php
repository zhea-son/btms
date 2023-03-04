<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Bus;
use App\Models\Route;
use App\Models\Schedule;
use Illuminate\Http\Request;

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
            'schedules' => Schedule::with(['bus','route'])->latest()->filter(request(['place','type']))->Simplepaginate(14)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $buses = Bus::all();
        $routes = Route::all();

        

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
        ]);
        
        foreach ($formFields as &$value) {
            $value = strip_tags($value);
        }

        $schedule = Schedule::where('bus_id', $formFields['bus_id'])
                                ->where('route_id', $formFields['route_id'])
                                ->where('date', $formFields['date'])
                                ->first();
            

        if($schedule){
            return response()->json(['message' => 'Bus is not available for the specified date and route.'], 400);
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


}
