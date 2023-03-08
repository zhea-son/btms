<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PagesController extends Controller
{
    public function home(){
        return view('pages.home');
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

    public function user_login(){
        return view('users.login');
    }

    public function user_signup(){
        return view('users.register');
    }

    public function new_user(Request $request){
        // dd($request);
        $formFields = $request->validate([
            'name' => ['required','min:3'],
            'email' => ['required','email',Rule::unique('users','email')],
            'password' => 'required|confirmed|min:6',
            'contact' => 'required',
        ]);

        //Hash Password
        $formFields['password'] = bcrypt($formFields['password']);

        //Create user
        $user = User::create($formFields);

        //Login
        auth()->login($user);

        return redirect('/')->with('message','User registered and Logged in Succesfully!');
        
    }

    public function authenticate(Request $request){
        $formFields = $request->validate([
            
            'email' => ['required','email'],
            'password' => 'required',

        ]);

        if(auth()->attempt($formFields)){
            $request->session()->regenerate();

            return redirect('/')->with('message',"Logged in succesfully.");
        }
        
        return back()->withErrors(['email'=>'Invalid Credentials'])->onlyInput('email');
    }

    public function logout(Request $request){
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/user/login')->with('message',"You have been logged out.");
    }

    public function live(){
        return view('pages.live');
    }

    public function buses(){
        return view('pages.buses');
    }
}
