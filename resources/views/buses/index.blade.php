@extends('layouts.layout')

@section('title','Buses')

@section('content')  

<div class="container px-5 py-24 mx-auto">
    @if(count($schedules) == 0)
        <p>No Buses found!</p>
    @endif
    <div class="flex flex-wrap -mx-4 -my-8">
    @foreach ($schedules as $schedule)
      <div class="py-4 px-4 lg:w-1/3">
        <div class="border-2 border-teal-200 border-opacity-60 rounded-lg h-full flex items-start">
          <div class="mt-4 w-12 flex-shrink-0 flex flex-col text-center leading-none">
            <span class="text-gray-500 pb-2 mb-2 border-b-2 border-gray-200">{{ date_create_from_format('U', strtotime($schedule->date))->format('F') }}</span>
            <span class="font-medium text-lg text-gray-800 title-font leading-none">{{ date_create_from_format('U', strtotime($schedule->date))->format('d') }}</span>
          </div>
          <div class="flex-grow pl-6">
            <h2 class="tracking-widest text-xs title-font font-medium text-teal-500 mb-1">{{ $schedule->company->company_name }}</h2>
            <h1 class="title-font text-xl font-medium text-gray-900 mb-3">{{ $schedule->route->name }}</h1>
            <ul class="flex">
            <li
                class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs"
                >
                <a href="/buses/?type={{$schedule->bus->type}}">{{$schedule->bus->type}}</a>
            </li>
            <li
                class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs"
                >
                <a href="/buses/?place={{$schedule->route->origin}}">{{$schedule->route->origin}}</a>
            </li>
            <li
                class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs"
                >
                <a href="/buses/?place={{$schedule->route->destination}}">{{$schedule->route->destination}}</a>
            </li>
            <li
                class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs"
                >
                <a href="/buses/?place={{$schedule->route->via}}">{{$schedule->route->via}}</a>
            </li>
            </ul>
            <p class="leading-relaxed mb-5">Departure at - {{ $schedule->departure_time }}</p>
            <ul class="flex">
                <li><p class="leading-relaxed mb-5">Rs. {{ $schedule->fare }}</p></li>
                <li class="ml-40">
                    <form action="/booking" method="POST">
                        @csrf
                        <input type="hidden" name="schedule_id" value="{{ $schedule->id }}">
                        <button type="submit" class="font-medium text-teal-600 dark:text-blue-500 hover:underline">Book Ticket</button>
                    </form>
                </li>
            </ul>
            
          </div>
        </div>
      </div>
      @endforeach
    </div>
    <div class="p-12 justify-center">{{$schedules->links()}}</div>

</div>

@endsection