@extends('company.master')

@section('title','Edit Route')

@section('content')
    
<h1 class="text-center text-4xl text-bold text-teal-500">Update Route</h1><!-- component -->

<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="/routes/{{$route->id}}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label class="text-xl text-gray-600">Origin</label></br>
                            <input type="text" class="border-2 border-gray-300 p-2 w-full" name="origin" id="origin"  value="{{$route->origin}}" required>
                            @error('origin')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="text-xl text-gray-600">Destination</label></br>
                            <input type="text" class="border-2 border-gray-300 p-2 w-full" name="destination" id="destination"  value="{{$route->destination}}" required>
                            @error('destination')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="text-xl text-gray-600">Distance</label></br>
                            <input type="text" class="border-2 border-gray-300 p-2 w-full" name="distance" id="distance" placeholder="in kilometers" value="{{$route->distance}}" required>
                            @error('distance')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="text-xl text-gray-600">Estimated Time</label></br>
                            <input type="text" class="border-2 border-gray-300 p-2 w-full" name="estimated_time" id="estimated_time" placeholder="in hours" value="{{$route->estimated_time}}" required>
                            @error('estimated_time')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="text-xl text-gray-600">Via</label></br>
                            <input type="text" class="border-2 border-gray-300 p-2 w-full" name="via" id="via" placeholder="in hours" value="{{$route->via}}" required>
                            @error('via')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>

                        
                        <div class="flex p-1">
                            
                            <button role="submit" class="p-3 bg-blue-500 text-white hover:bg-blue-400" required>Update</button>
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

