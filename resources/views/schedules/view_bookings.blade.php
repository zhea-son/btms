@vite(['resources/css/app.css', 'resources/js/app.js'])

<div class="container">

    <h1> This is Bookings Info </h1>
    <h3> Seats Booked: {{ $seats_booked }}</h3>
    <h3> Available Seats: {{ $total_seats - $seats_booked }}</h3>
    <h3> Bus Status: @if(!$schedule->completed) At {{ $schedule->status }} @else Completed @endif</h3>
    <table style="border:2px solid black;text-align:center;">
        <tr><th style="border:2px solid black;">S.N.</th>
            <th style="border:2px solid black;">User</th>
            <th style="border:2px solid black;">Seats Booked</th>
            <th style="border:2px solid black;">Amount to be paid</th>
            <th style="border:2px solid black;">Status</th>
        </tr>
        @foreach($bookings as $booking)
            <tr>
                <td style="border:2px solid black;">{{ $loop->iteration }}</td>
                <td style="border:2px solid black;">{{ $booking->user->name }}</td>
                <td style="border:2px solid black;">{{ $booking->seats }}</td>
                <td style="border:2px solid black;">{{ $booking->amount }}</td>
                @if ($booking->paid)
                <td style="border:2px solid black;">Paid</td>
                @else
                    @if($booking->payment_unique_id == "Hand Cash")
                    <td style="border:2px solid black;">Cash on Bus</td>
                    @else
                    <td style="border:2px solid black;">Unpaid</td>
                    @endif
                @endif
            </tr>
        @endforeach
        </table>
<a href="/company/{{ $booking->schedule->id }}/schedule_info" class="text-teal-500 underline">Start the Trip</a><br>
<a href="/company/schedules" class="text-blue-500 underline">Go to my Schedules</a>
        
</div>