@extends('layouts.layout')

@section('title','Schedules')

@section('content')  


<div class="container px-2 py-12 mx-auto">
  <a href="/schedules/create">Create Schedule</a>

    @if(count($schedules) == 0)
        <p>No Schedules found!</p>
    @endif
    <div class="flex flex-wrap -m-4">
        <div class="container px-5 py-24 mx-auto">
            <div class="flex flex-wrap -mx-4 -my-8">
                @foreach ($schedules as $schedule)
              <div class="py-8 px-4 lg:w-1/3 border border-teal-500">
                <div class="h-full flex items-start">
                  
                  <div class="flex-grow pl-6">
                    <h2 class="tracking-widest text-xs title-font font-medium text-indigo-500 mb-1">{{$schedule->date}}</h2>
                    <h1 class="title-font text-xl font-medium text-gray-900 mb-3">{{$schedule->route->name}}</h1>
                    <h1 class="title-font text-xl font-medium text-gray-900 mb-3">{{$schedule->bus->number_plate}} </h1>
                    <p class="leading-relaxed mb-5">{{$schedule->departure_time}}</p>
                    <p class="leading-relaxed mb-5">Rs. {{$schedule->fare}}</p>
                    <ul class="flex">
                      <li
                      class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs"
                      >
                        <a href="/schedules/?type={{$schedule->bus->type}}">{{$schedule->bus->type}}</a>
                      </li>
                      <li
                            class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs"
                        >
                            <a href="/schedules/?place={{$schedule->route->origin}}">{{$schedule->route->origin}}</a>
                        </li>
                        <li
                        class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs"
                        >
                        <a href="/schedules/?place={{$schedule->route->destination}}">{{$schedule->route->destination}}</a>
                    </li>
                    </ul>
                    @php $via = explode(',', $schedule->route->via) @endphp
                    <ul class="flex">
                      @foreach ($via as $item)
                          
                      <li
                      class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs"
                      >
                      <a href="/schedules/?place={{$item}}">{{$item}}</a>
                    </li>
                    @endforeach
                    </ul>
                    <ul class="flex">
                      <li
                          class="text-indigo-500 inline-flex items-center px-2 md:mb-2 lg:mb-0"
                      >
                          <a href="#">Buy Ticket!</a>
                      </li>
                      <li
                          class="text-yellow-500 inline-flex items-center px-2 md:mb-2 lg:mb-0"
                      >
                          <a href="#">Set Return Trip!</a>
                      </li>
                      <li
                          class="text-blue-500 inline-flex items-center px-2 md:mb-2 lg:mb-0"
                      >
                          <a href="/schedules/{{$schedule->id}}/edit">Edit</a>
                      </li>
                      <li
                          class="text-red-500 inline-flex items-center px-center md:mb-2 lg:mb-0"
                      >
                      <form method="POST" action="/schedules/{{$schedule->id}}">
                          @csrf
                          @method('DELETE')
                          <button type="submit">Delete</button>        
                        </form>
                      </li>
                      </ul>
                  </div>
                </div>
              </div>

              @endforeach
            </div>
        </div></
                
                
                
            
      
    

    <div class="p-12 justify-center">{{$schedules->links()}}</div>
</div>
@endsection