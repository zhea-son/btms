@extends('layouts.layout')
@section('content')
    
<h1 class="text-center text-4xl text-bold text-teal-500">Login User</h1><!-- component -->


<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <form method="POST" action="/user/authenticate">
                    @csrf
                    

                    <div class="mb-4">
                        <label class="text-xl text-gray-600">Email</label></br>
                        <input type="email" class="border-2 border-gray-300 p-2 w-full" name="email" id="email" value="{{old('email')}}">
                        @error('email')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                    </div>

                    <div class="mb-4">
                        <label class="text-xl text-gray-600">Password</label></br>
                        <input type="password" class="border-2 border-gray-300 p-2 w-full" name="password" id="password" value="{{old('password')}}">
                        @error('password')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                    </div>

                    

                    <div class="flex p-1">
                        
                        <button role="submit" class="p-3 bg-teal-500 text-white hover:bg-teal-700" required>Login</button>
                    </div>

                    <div class="pt-4">
                        <p>
                            <a href="/user/register" class="underline text-blue-500">Dont't Have an Account?</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection