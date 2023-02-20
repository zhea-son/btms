@extends('layouts.layout')

@section('title','Search Bus')

@section('content')
    
<h1 class="text-center text-4xl text-bold text-teal-500">Book a Ticket</h1><!-- component -->

<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="/show" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label class="text-xl text-gray-600">From </label></br>
                            <select name="from">
                                <option>--Select</option>
                                <option value="Kathmandu">Kathmandu</option>
                                <option value="Pokhara">Pokhara</option>
                                <option value="Biratnagar">Biratnagar</option>
                                <option value="Bharatpur">Bharatpur</option>
                                <option value="Janakpur">Janakpur</option>
                                <option value="Lalitpur">Lalitpur</option>
                                <option value="Birgunj">Birgunj</option>
                                <option value="Dharan">Dharan</option>
                                <option value="Butwal">Butwal</option>
                                <option value="Bhaktapur">Bhaktapur</option>
                                <option value="Chitwan">Chitwan</option>
                                <option value="Nepalgunj">Nepalgunj</option>
                                <option value="Hetauda">Hetauda</option>
                                <option value="Ilam">Ilam</option>
                                <option value="Dhangadhi">Dhangadhi</option>
                                <option value="Birtamod">Birtamod</option>
                                <option value="Tikapur">Tikapur</option>
                                <option value="Damak">Damak</option>
                                <option value="Mahendranagar">Mahendranagar</option>
                                <option value="Bhimdatta">Bhimdatta</option>
                                <option value="Ghorahi">Ghorahi</option>
                                <option value="Itahari">Itahari</option>
                                <option value="Birendranagar">Birendranagar</option>
                                <option value="Jhapa">Jhapa</option>
                                <option value="Narayangadh">Narayangadh</option>
                                <option value="Dhankuta">Dhankuta</option>
                                <option value="Bhojpur">Bhojpur</option>
                                <option value="Tansen">Tansen</option>
                                <option value="Gulmi">Gulmi</option>
                                <option value="Palpa">Palpa</option>
                                <option value="Syangja">Syangja</option>
                            </select>
                            @error('from')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="text-xl text-gray-600">To </label></br>
                            <select name="to">
                                <option>--Select</option>
                                <option value="Kathmandu">Kathmandu</option>
                                <option value="Pokhara">Pokhara</option>
                                <option value="Biratnagar">Biratnagar</option>
                                <option value="Bharatpur">Bharatpur</option>
                                <option value="Janakpur">Janakpur</option>
                                <option value="Lalitpur">Lalitpur</option>
                                <option value="Birgunj">Birgunj</option>
                                <option value="Dharan">Dharan</option>
                                <option value="Butwal">Butwal</option>
                                <option value="Bhaktapur">Bhaktapur</option>
                                <option value="Chitwan">Chitwan</option>
                                <option value="Nepalgunj">Nepalgunj</option>
                                <option value="Hetauda">Hetauda</option>
                                <option value="Ilam">Ilam</option>
                                <option value="Dhangadhi">Dhangadhi</option>
                                <option value="Birtamod">Birtamod</option>
                                <option value="Tikapur">Tikapur</option>
                                <option value="Damak">Damak</option>
                                <option value="Mahendranagar">Mahendranagar</option>
                                <option value="Bhimdatta">Bhimdatta</option>
                                <option value="Ghorahi">Ghorahi</option>
                                <option value="Itahari">Itahari</option>
                                <option value="Birendranagar">Birendranagar</option>
                                <option value="Jhapa">Jhapa</option>
                                <option value="Narayangadh">Narayangadh</option>
                                <option value="Dhankuta">Dhankuta</option>
                                <option value="Bhojpur">Bhojpur</option>
                                <option value="Tansen">Tansen</option>
                                <option value="Gulmi">Gulmi</option>
                                <option value="Palpa">Palpa</option>
                                <option value="Syangja">Syangja</option>
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

