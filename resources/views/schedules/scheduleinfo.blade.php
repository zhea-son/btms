@vite(['resources/css/app.css', 'resources/js/app.js'])


<h1> This is Schedule Info </h1>
<p>Click the button that the bus just passed!!</p>



@if($schedule->completed == true)
<p> The schedule is already completed.

@else
<p> {{ $schedule->status }} </p>
<form method="POST" action="{{ route('schedule.update_status', $schedule->id) }}">
    @csrf
    @method('PUT')
    <input type="hidden" value="{{ $schedule->id }}">
    @if ($schedule->status == "Stand By")
        @foreach ($vial as $item)
            <button class="bg-blue-500 hover:bg-blue-800 text-black px-4 py-2 rounded" role="submit" name="status" value="{{$item}}">{{$item}}</button>>>
        @endforeach
    @else
        @foreach ($vial as $item)
            @if (array_search($item, $vial) <= array_search($schedule->status, $vial) )
                <button class="bg-green-500 text-black px-4 py-2 rounded opacity-500 cursor-not-allowed" disabled>{{$item}}</button>
            @else
                <button class="bg-blue-500 hover:bg-blue-800 text-black px-4 py-2 rounded" role="submit" name="status" value="{{$item}}">{{$item}}</button>>>
            @endif
        @endforeach
    @endif
</form>
@if ($schedule->status == $schedule->route->destination)
<form method="POST" action="{{ route('schedules.complete', $schedule->id) }}">
    @csrf
    @method('PUT')
    <button type="submit" class="text-emerald-500 btn btn-primary underline">Complete the Trip??</button>
</form>
<a href="/company/schedules" class="text-blue-500 underline">Go to my Schedules</a>
@else
    
@endif

    
@endif