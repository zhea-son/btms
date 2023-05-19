@extends('layouts.layout')

@section('title','About Us')

@section('content')
<div class="container px-5 mb-5 mx-auto">
    <div class="text-center mb-20">
      <h1 class="sm:text-3xl text-2xl font-medium title-font text-teal-700 mb-4">Our Team</h1>
      <p class="text-base leading-relaxed xl:w-2/4 lg:w-3/4 mx-auto text-gray-500s">Jane HO is a Bus Ticketing and Bus Transport Management System with specified facilty of ticketing service for long distance vehicles for the users as well as a fleet management software for transport companies. </p>
      <div class="flex mt-6 justify-center">
        <div class="w-16 h-1 rounded-full bg-indigo-500 inline-flex"></div>
      </div>
    </div>
    <div class="flex flex-wrap sm:-m-4 -mx-4 -mb-10 -mt-4 md:space-y-0 space-y-6">
      <div class="p-4 md:w-1/3 flex flex-col text-center items-center">
        <div class="w-20 h-22 display-flex align-items-center justify-content-center bg-indigo-100 text-indigo-500 mb-5 flex-shrink-0">
          <img src="assets/images/ranjan.jpg">
        </div>
        <div class="flex-grow">
          <h2 class="text-gray-900 text-lg title-font font-medium mb-3">Ranjan Khanal</h2>
          <p class="leading-relaxed text-base">Ranjan Khanal is a BSc.CSIT student at Lumbini ICT Campus, Gaindakot, Nawalpur. Ranjan plays a vital role in developing our project.
            Ranjan Khanal works as both frontend and backend develper.
          </p>
          <a class="mt-3 text-indigo-500 inline-flex items-center">Learn More
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
              <path d="M5 12h14M12 5l7 7-7 7"></path>
            </svg>
          </a>
        </div>
      </div>
      <div class="p-4 md:w-1/3 flex flex-col text-center items-center">
        <div class="w-20 h-30 display-flex align-items-center justify-content-center bg-indigo-100 text-indigo-500 mb-5 flex-shrink-0">
          <img src="assets/images/ritesh.jpg">
        </div>
        <div class="flex-grow">
          <h2 class="text-gray-900 text-lg title-font font-medium mb-3">Reetesh Mahato</h2>
          <p class="leading-relaxed text-base">Reetesh Mahato is also a BSc.CSIT student at Lumbini ICt Campus , Gaindakot, Nawalpur. Ritesh Mahato works as a frontend developer. He is from Khairahani-7, Chitwan. </p>
          <a class="mt-3 text-indigo-500 inline-flex items-center">Learn More
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
              <path d="M5 12h14M12 5l7 7-7 7"></path>
            </svg>
          </a>
        </div>
      </div>
      <div class="p-4 md:w-1/3 flex flex-col text-center items-center">
        <div class="w-20 h-20 display-flex align-item-center justify-content-center bg-color-#252d5d text-indigo-500 mb-5 flex-shrink-0">
          <img  border-radius=50% border=10px solid=#fff src="assets/images/sabin.jpg">
        </div>
        <div class="flex-grow">
          <h2 class="text-gray-900 text-lg title-font font-medium mb-3">Sabin Adhikari</h2>
          <p class="leading-relaxed text-base">Sabin Adhikari one of the topper of BSc.CSIT at Lumbini ICT Campus is very talented and hard worker. He is from Shukranagar, Chitwan. He is a frontend and backend developer.</p>
          <a class="mt-3 text-indigo-500 inline-flex items-center">Learn More
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
              <path d="M5 12h14M12 5l7 7-7 7"></path>
            </svg>
          </a>
        </div>
      </div>
    </div>
  </div>
    
@endsection