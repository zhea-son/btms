<?php

namespace App\Http\Controllers;

use App\Models\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoutesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('routes.index', [
            // 'routes' => Bus::latest()->filter(request(['to','from','type']))->Simplepaginate(6)
            'routes' => Route::latest()->filter(request(['origin','destination','via']))->Simplepaginate(14)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('routes.create');
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
            'origin' => 'required',
            'destination' => 'required',
            'via' => 'required',
            'distance' => 'required',
            'estimated_time' => 'required',
        ]);
        foreach ($formFields as &$value) {
            $value = strip_tags($value);
        }

        $formFields['name']= "From ". $formFields['origin']." To ".$formFields['destination']." via. ". $formFields['via'];
        $formFields['company_id'] = Auth::guard('company')->user()->id;
        
        
        Route::create($formFields);


        return redirect('/company/routes')->with('message', "Route created successfully!");
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
    public function edit(Route $route)
    {
        return view('routes.edit' ,['route' => $route]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Route $route)
    {
        $formFields = $request->validate([
            'origin' => 'required',
            'destination' => 'required',
            'via' => 'required',
            'distance' => 'required',
            'estimated_time' => 'required',
        ]);
        foreach ($formFields as &$value) {
            $value = strip_tags($value);
        }

        $formFields['name']= "From ". $formFields['origin']." To ".$formFields['destination']." via. ". $formFields['via'];

        $route->update($formFields);

        return redirect('/company/routes')->with('message', "Route updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Route $route)
    {
        $route->delete();
        return back()->with('message', 'Route deleted successfully!');
    }
}
