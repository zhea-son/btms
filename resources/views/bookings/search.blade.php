@extends('layouts.layout')

@section('title','Search Bus')

@section('content')
    
<h1 class="text-center text-4xl text-bold text-teal-500">Book a Ticket</h1><!-- component -->

<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="/search" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label class="text-xl text-gray-600">From </label></br>
                            <select name="from">
                                <option>--Select</option>
                                @foreach ($from as $f)
                                <option value="{{ $f }}">{{ $f }}</option>
                                    
                                @endforeach
                                
                            </select>
                            @error('from')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="text-xl text-gray-600">To </label></br>
                            <select name="to">
                                <option>--Select</option>
                                @foreach ($to as $t)
                                <option value="{{ $t }}">{{ $t }}</option>
                                    
                                @endforeach
                            </select>
                            @error('to')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>

                        {{-- <div class="mb-8">
                            <label class="text-xl text-gray-600">Description <span class="text-red-500">*</span></label></br>
                            <textarea name="description" class="border-2 border-gray-500">
                                {{old('author')}}
                            </textarea>
                            @error('description')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div> --}}

                        <div class="mb-4">
                            <label class="text-xl text-gray-600">Date</label></br>
                            <input type="date" min="{{ Carbon\Carbon::today()->format('Y-m-d') }}" class="border-2 border-gray-300 p-2 w-full" name="date" id="date" value="{{old('date')}}">
                            @error('date')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>

                        
                        {{-- <div class="mb-4">
                            <label class="text-xl text-gray-600">From</label></br>
                            <input type="text" class="border-2 border-gray-300 p-2 w-full" name="from" id="from" value="{{old('from')}}">
                            @error('from')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>
                        
                        <div class="mb-4">
                            <label class="text-xl text-gray-600">To</label></br>
                            <input type="text" class="border-2 border-gray-300 p-2 w-full" name="to" id="to" value="{{old('to')}}">
                            @error('to')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="text-xl text-gray-600">Fare</label></br>
                            <input type="text" class="border-2 border-gray-300 p-2 w-full" name="fare" id="fare" value="{{old('fare')}}">
                            @error('fare')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div> --}}

                        {{-- <div class="mb-4">
                            <label class="text-xl text-gray-600">Image</label></br>
                            <input type="file" class="border-2 border-gray-300 p-2 w-full" name="image" id="image" value="{{old('image')}}">
                            @error('image')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="text-xl text-gray-600">Contact</label></br>
                            <input type="text" class="border-2 border-gray-300 p-2 w-full" name="contact" id="contact" value="{{old('contact')}}">
                            @error('contact')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div> --}}

                        <div class="flex p-1">
                            
                            <button role="Search" class="p-3 bg-blue-500 text-white hover:bg-blue-400" required>Submit</button>
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

