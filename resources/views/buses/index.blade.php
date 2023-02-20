@extends('layouts.layout')

@section('title','Buses')

@section('content')  


<div class="container px-2 py-12 mx-auto">
    @if(count($buses) == 0)
        <p>No Posts found!</p>
    @endif
    <div class="flex flex-wrap -m-4">
        @foreach ($buses as $bus)
        <div class="p-4 md:w-1/3">
            <div class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden">
              <img class="lg:h-48 md:h-36 w-full object-cover object-center" src="{{$bus->image ? '/storage/' .$bus->image : '/assets/images/janeho.png'}}" alt="bus">
                
              {{-- <x-bus-tags :tagsCsv="$bus->tags" /> --}}
              
                {{-- <h2 class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1">{{ $bus->genre }}</h2> --}}
                <h2 class="title-font text-lg font-medium text-red-700 mb-3">{{ $bus->number_plate }}</h2>
                {{-- <h2 class="title-font text-lg font-medium text-red-700 mb-3">{{ $bus->to }}</h2> --}}

                <ul class="flex">
                    {{-- <li
                        class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs"
                    >
                        <a href="/buses/?to={{$bus->to}}">{{$bus->to}}</a>
                    </li>
                    <li
                    class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs"
                    >
                    <a href="/buses/?from={{$bus->from}}">{{$bus->from}}</a>
                </li> --}}
                <li
                    class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs"
                    >
                    <a href="/buses/?type={{$bus->type}}">{{$bus->type}}</a>
                </li>
                </ul>
                <ul class="flex">
                
                <li
                    class="text-blue-500 px-2 inline-flex items-center md:mb-2 lg:mb-0"
                >
                    <a href="/buses/{{$bus->id}}/edit">Edit</a>
                </li>
                <li
                    class="text-red-500 px-2 inline-flex items-center md:mb-2 lg:mb-0"
                >
                <form method="POST" action="/buses/{{$bus->id}}">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>        
                  </form>
                </li>
                <li
                    class="text-teal-500 px-2 inline-flex items-center md:mb-2 lg:mb-0"
                >
                    <a href="/schedules/{{$bus->id}}/create">Add to Schedule</a>
                </li>
                </ul>
                {{-- <p class="leading-relaxed mb-3">Photo booth fam kinfolk cold-pressed sriracha leggings jianbing microdosing tousled waistcoat.</p> --}}
                
              </div>
        </div>
            
      
        @endforeach
    </div>

    <div class="p-12 justify-center">{{$buses->links()}}</div>
</div>
@endsection