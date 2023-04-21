@extends('layouts.layout')

@section('title','Booking Bus')

@section('content')
    
<h1 class="text-center text-4xl text-bold text-teal-500">Select Seats</h1><!-- component -->

<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="/user/bookings" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label class="text-xl text-gray-600">Seats </label></br>
                            <input type="text" class="border-2 border-gray-300 p-2 w-full" name="seats" id="seats" placeholder="Enter number of seats you want to book." value="{{old('seats')}}" required>
                            @error('seats')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>

                        <input type="hidden" name="schedule_id" value="{{ $schedule_id }}">
                        <input type="hidden" name="fare" value="{{ $fare }}">
                        <input type="hidden" name="available_seats" value="{{ $available_seats }}">
                        <div class="flex p-1">
                            
                            <button role="submit" class="p-3 bg-teal-500 rounded-xl text-white hover:bg-blue-400" required>Book</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>

    <script>
        CKEDITOR.replace( 'description' );
    </script>
@endsection

