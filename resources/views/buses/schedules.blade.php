@vite(['resources/css/app.css', 'resources/js/app.js'])

<center>
    <h1>{{ $bus->number_plate }}</h1>
    <p>Bus Type : {{ $bus->type }}</p>
    <p>{{ $bus->company->company_name }}</p>
    <div class="container">
    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Date
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Departure Time
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Remarks
                    </th>
                </tr>
            </thead>
            <tbody>
                @if (count($schedules) == 0)
                    <tr> No Upcoming or Current Schedules </tr>
                @endif
                @foreach ($schedules as $schedule)
                    
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $schedule->date }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $schedule->departure_time }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $schedule->route->name }}
                    </td>
                    <td class="px-6 py-4">
                        @if (Carbon\Carbon::parse(strtotime($schedule->departure_time))->gt(Carbon\Carbon::now()))
                            <a href="{{ route('schedule.info', $schedule->id) }}"><p style="color:green;">Started and Running</p></a>
                        @else
                            <p style="color:red;">Upcoming</p>
                        @endif
                    </td>
                    
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</center>