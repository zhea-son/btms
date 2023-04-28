<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Bus;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BusesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageTitle = "Most Popular Buses";
        $today = Carbon::today();
        $schedules = Schedule::where('completed', false)->whereBetween('date', [$today, $today->copy()->addWeek()]);
        
        return view('buses.index', [
            'schedules' => $schedules->filter(request(['place','type']))->Simplepaginate(9), 
            'pageTitle' =>  $pageTitle
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('buses.create');
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
            'number_plate' => 'required',
            'type' => 'required',
            'contact' => 'required',
            'seats' => 'required',

        ]);



        // $input = array_map(function($field) {
        //     return strip_tags($field);
        // }, $formFields);

        foreach ($formFields as &$value) {
            $value = strip_tags($value);
        }

        if($request->hasFile('image')){
            $formFields['image'] = $request->file('image')->store('buses','public');
        }
        $formFields['company_id'] = Auth::guard('company')->user()->id;


        // $formFields['user_id'] = auth()->id();
        // $formFields['author'] = auth()->user()->name;
        Bus::create($formFields);

        return redirect('/company/buses')->with('message', "Bus created successfully!");
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
    public function edit(Bus $bus)
    {
        return view('buses.edit' ,['bus' => $bus]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bus $bus)
    {
        // if($listing->user_id != auth()->id()){
        //     abort(403,'Unauthorized Action');
        // }
        $formFields = $request->validate([
            'number_plate' => 'required',
            'type' => 'required',
            'contact' => 'required',
            'seats' => 'required',
        ]);



        // $input = array_map(function($field) {
        //     return strip_tags($field);
        // }, $formFields);

        foreach ($formFields as &$value) {
            $value = strip_tags($value);
        }

        if($request->hasFile('images')){
            $formFields['images'] = $request->file('images')->store('buses','public');
        }
        $bus->update($formFields);

        return redirect('/company/buses')->with('message', "Bus updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bus $bus)
    {
        // if($listing->user_id != auth()->id()){
        //     abort(403,'Unauthorized Action');
        // }
        $bus->delete();
        return back()->with('message', 'Bus deleted successfully!');
    }
}
