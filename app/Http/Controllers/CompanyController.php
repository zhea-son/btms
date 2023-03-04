<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use App\Models\Route;
use App\Models\Company;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CompanyController extends Controller
{
    public function dashboard(){
        $company = Auth::guard('company')->user();
        return view('company.dashboard', ['company' => $company]);
    }

    public function show_signup(){
        return view('company.signup');
    }

    public function show_login(){
        return view('company.login');
    }

    public function register(Request $request){

        $validator = Validator::make($request->all(), [
            'company_name' => ['required','min:3'],
            'email' => ['required','email',Rule::unique('companies','email')],
            'password' => 'required|confirmed|min:8',
            'registration_number' => 'required',
            'contact' => 'required',
            'office_location' => 'required',
        ]);
        // $formFields = $request->all();
        // dd($formFields);
        if ($validator->fails()) {
            // dd($validator->errors());
            return back()->withErrors($validator)->withInput();
        }
        
        $formFields = $request->validate([
            'company_name' => ['required','min:3'],
            'email' => ['required','email',Rule::unique('companies','email')],
            'contact' => 'required',
            'password' => 'required|confirmed|min:8',
            'registration_number' => 'required',
            'office_location' => 'required',
        ]);     

            //Hash Password
            $formFields['password'] = bcrypt($formFields['password']);
    
            //Create user
            Company::create($formFields);
    
            //Login
            // auth()->login($user);
    
            return redirect()->route('company.login')->with('message','Company registered Succesfully!');
    }

    public function authenticate(Request $request){

        // dd($request);
        
        $check = $request->all();
        if(Auth::guard('company')->attempt(['email' => $check['email'],
                                          'password' => $check['password']])){
                                            return redirect()->route('company.dashboard')->with('message','Logged in succesfully.');
        }else{
            return back()->withErrors(['email'=>'Invalid Credentials'])->onlyInput('email');
        }
    }

    public function logout(){

        Auth::guard('company')->logout();
        return redirect()->route('company.login');

    }

    public function my_buses(){
        $company = Auth::guard('company')->user();
        $buses = Bus::all();
        return view('company.buses', ['company' => $company], compact('buses'));
    }

    public function my_routes(){
        $company = Auth::guard('company')->user();
        $routes = Route::all();
        return view('company.routes', ['company' => $company], compact('routes'));
    }

    public function my_schedules(){
        $company = Auth::guard('company')->user();
        
        return view('company.schedules', [
            'company' => $company,
            'schedules' => Schedule::with(['bus','route'])->get()
    ]);
    }

}
