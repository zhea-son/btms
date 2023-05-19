@extends('layouts.layout')

@section('title','Log In')

@section('content')

    
<div class="container mx-auto flex px-5 py-12 md:flex-row flex-col items-center">
    <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6 mb-10 md:mb-0">
      <img class="object-cover object-center rounded" alt="hero" src="assets/images/log.jpg">
    </div>
    <div class="lg:flex-grow md:w-1/2 lg:pl-24 md:pl-16 flex flex-col md:items-start md:text-left items-center text-center">
      <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">Sign in to Your Account
      </h1>
      <p class="mb-8 leading-relaxed">Unluck your travel experience with just a few clicks.</p>
      <div class="flex justify-center"> 
        <button class="inline-flex text-white bg-teal-600 hover:bg-teal-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center"><a href="{{ route('users.login') }}">Login as USER</a></button>
        <button class="ml-4 inline-flex text-white bg-teal-600 hover:bg-teal-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center"><a href="{{ route('company.login') }}">Login as Company</a></button>
      </div>
    </div>
  </div>

@endsection