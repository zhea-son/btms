@extends('layouts.layout')

@section('title','Routes')

@section('content')  



<div class="container px-2 py-12 mx-auto">
  
  <a href="/routes/create" >Create Route</a>
    @if(count($routes) == 0)
        <p>No Routes found!</p>
    @endif
    <div class="flex flex-wrap -m-4">
        <div class="container px-5 py-24 mx-auto">
            <div class="flex flex-wrap -mx-4 -my-8">
                @foreach ($routes as $route)
              <div class="py-8 px-4 lg:w-1/3 border border-teal-500">
                <div class="h-full flex items-start">
                  
                  <div class="flex-grow pl-6">
                    <h2 class="tracking-widest text-xs title-font font-medium text-indigo-500 mb-1">{{$route->distance}} km</h2>
                    <h1 class="title-font text-xl font-medium text-gray-900 mb-3">{{$route->name}}</h1>
                    <p class="leading-relaxed mb-5">Estimated Time: {{$route->estimated_time}} hrs.</p>
                    
                    <ul class="flex">
                        <li
                            class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs"
                        >
                            <a href="/routes/?origin={{$route->origin}}">{{$route->origin}}</a>
                        </li>
                        <li
                        class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs"
                        >
                        <a href="/routes/?destination={{$route->destination}}">{{$route->destination}}</a>
                    </li>
                    <li
                        class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs"
                        >
                        <a href="/routes/?via={{$route->via}}">{{$route->via}}</a>
                    </li>
                    {{-- <li
                        class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs"
                        >
                        <a href="/buses/?type={{$route->type}}">{{$route->type}}</a>
                    </li> --}}
                    </ul>
                    <ul class="flex">
                        <li
                        class="text-teal-500 px-2 inline-flex items-center md:mb-2 lg:mb-0"
                    >
                        <a href="/schedules/{{$route->id}}/create">Add to Schedule</a>
                    </li>
                    <li
                        class="text-blue-500 inline-flex items-center px-2 md:mb-2 lg:mb-0"
                    >
                        <a href="/routes/{{$route->id}}/edit">Edit</a>
                    </li>
                    <li
                        class="text-red-500 inline-flex items-center px-2 md:mb-2 lg:mb-0"
                    >
                    <form method="POST" action="/routes/{{$route->id}}">
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
                
                
                
            
      
    

    <div class="p-12 justify-center">{{$routes->links()}}</div>
</div>
@endsection