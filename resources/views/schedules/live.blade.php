@extends('layouts.layout')

@section('title','Live Update')

@section('content')
<h1 class="text-center text-4xl text-bold text-teal-500">Live Update</h1>

@if (count($schedules) == 0)
            <p>No running buses</p>

@else



<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="container mt-5 w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Bus Type
                </th>
                <th scope="col" class="px-6 py-3">
                    Route
                </th>
                <th scope="col" class="px-6 py-3">
                    Departure Time
                </th>
                <th scope="col" class="px-6 py-3">
                    Status
                </th>
                <th scope="col" class="px-6 py-3">
                    Fare
                </th>
                <th scope="col" class="px-6 py-3">
                    Available Seats
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>

            @foreach ($schedules as $schedule)
                
            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $schedule->bus->type }}
                </th>
                <td class="px-6 py-4">
                    {{ $schedule->route->name }}
                </td>
                <td class="px-6 py-4">
                    {{ $schedule->departure_time }}
                </td>
                <td class="px-6 py-4">
                    Arrived at {{ $schedule->status }}
                </td>
                <td class="px-6 py-4">
                    {{ $schedule->fare }}
                </td>
                <td class="px-6 py-4">
                    {{ $schedule->bus->seats }}
                </td>
                <td class="px-6 py-4">
                    <form action="/booking" method="POST">
                        @csrf
                        <input type="hidden" name="schedule_id" value="{{ $schedule->id }}">
                        <button type="submit" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Book Ticket</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endif
    
@endsection