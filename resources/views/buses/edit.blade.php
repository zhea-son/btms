@extends('company.master')

@section('title','Edit Bus')

@section('content')
    
<h1 class="text-center text-4xl text-bold text-teal-500">Edit a Bus</h1><!-- component -->

<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="/buses/{{$bus->id}}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label class="text-xl text-gray-600">Number Plate </label></br>
                            <input type="text" class="border-2 border-gray-300 p-2 w-full" name="number_plate" id="number_plate" placeholder="Eg:Ba-Pra-02-022-Pa-9181" value="{{$bus->number_plate}}" required>
                            @error('title')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="text-xl text-gray-600">Type</label></br>
                            <select class="border-2 border-gray-300 border-r p-2 w-full" name="type">
                                <option>--Select</option>
                                <option name="Tourist" {{  old('type',$bus->type) == 'tourist' ? 'selected' : '' }}>Tourist</option>
                                <option name="Deluxe" {{  old('type',$bus->type) == 'deluxe' ? 'selected' : '' }}>Deluxe</option>
                                <option name="Semi-deluxe" {{  old('type',$bus->type) == 'semi-deluxe' ? 'selected' : '' }}>Semi-Deluxe</option>
                                <option name="Micro" {{  old('type',$bus->type) == 'micro' ? 'selected' : '' }}>Micro</option>
                                

                            </select>
                            @error('type')
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
                            <label class="text-xl text-gray-600">Seats</label></br>
                            <input type="text" class="border-2 border-gray-300 p-2 w-full" name="seats" id="seats" value="{{$bus->seats}}">
                            @error('seats')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>

                        
                        {{-- <div class="mb-4">
                            <label class="text-xl text-gray-600">From</label></br>
                            <input type="text" class="border-2 border-gray-300 p-2 w-full" name="from" id="from" value="{{$bus->from}}">
                            @error('from')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>
                        
                        <div class="mb-4">
                            <label class="text-xl text-gray-600">To</label></br>
                            <input type="text" class="border-2 border-gray-300 p-2 w-full" name="to" id="to" value="{{$bus->to}}">
                            @error('to')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="text-xl text-gray-600">Fare</label></br>
                            <input type="text" class="border-2 border-gray-300 p-2 w-full" name="fare" id="fare" value="{{$bus->fare}}">
                            @error('fare')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div> --}}

                        <div class="mb-4">
                            <label class="text-xl text-gray-600">Image</label></br>
                            <input type="file" class="border-2 border-gray-300 p-2 w-full" name="image" id="image" value="{{$bus->image}}">
                            @error('image')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="text-xl text-gray-600">Contact</label></br>
                            <input type="text" class="border-2 border-gray-300 p-2 w-full" name="contact" id="contact" value="{{$bus->contact}}">
                            @error('contact')
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

