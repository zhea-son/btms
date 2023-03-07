@extends('company.master')

@section('title','Schedules')

@section('content')
    
<h1 class="text-center text-4xl text-bold text-teal-500">Add Schedule</h1><!-- component -->

<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="/schedules" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label class="text-xl text-gray-600">Bus</label></br>
                            <select name="bus_id">
                                @foreach ($buses as $bus)
                                    <option value="{{ $bus->id }}">{{ $bus->number_plate }} {{ $bus->type }}</option>
                                @endforeach
                            </select>
                            @error('bus_id')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="text-xl text-gray-600">Route</label></br>
                            <select name="route_id">
                                @foreach ($routes as $route)
                                    <option value="{{ $route->id }}">{{ $route->name }}</option>
                                @endforeach
                            </select>
                            @error('route_id')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="text-xl text-gray-600">Date</label></br>
                            <input type="date" min="{{ Carbon\Carbon::today()->format('Y-m-d') }}" class="border-2 border-gray-300 p-2 w-full" name="date" id="date"  value="{{old('date')}}" required>
                            @error('date')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="text-xl text-gray-600">Departure Time</label></br>
                            <input type="text" class="border-2 border-gray-300 p-2 w-full" name="departure_time" id="departure_time"  placeholder="hh:mm:00" value="{{old('departure_time')}}" required>
                            @error('departure_time')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="text-xl text-gray-600">Fare</label></br>
                            <input type="text" class="border-2 border-gray-300 p-2 w-full" name="fare" id="fare" placeholder="in rupees" value="{{old('fare')}}" required>
                            @error('fare')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>

                        

                        
                        <div class="flex p-1">
                            
                            <button role="submit" class="p-3 bg-blue-500 text-white hover:bg-blue-400" required>Submit</button>
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

