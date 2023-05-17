@extends('layouts.layout')

@section('title','Booking Details')

<style>
.first{
    background-color: antiquewhite;
    height:400px;
    width:500px;
    border: 2px solid teal;
}
.second{
    height:25%;
    width:30%;
    border: 2px solid teal;
    float:left;
}

.third{
    height:25%;
    width:30%;
    border: 2px solid teal;
    float:left;
}
.fourth{
    height:25%;
    width:40%;
    border: 2px solid teal;
    float:left;
}
.fifth{
    background-color: beige;
    height:25%;
    width:100%;
    border: 2px solid teal;
    float:left;
}
.sixth{
    height:25%;
    width:100%;
    float:left;
}
.seventh{
    height:100%;
    width:50%;
    border: 2px solid teal;
    float:left;
}
.eighth{
    height:100%;
    width:50%;
    border: 2px solid teal;
    float:left;
}
.ninth{
    background-color: bisque;
    height:25%;
    width:100%;
    float:left;
}
.tenth{
    height:50%;
    border: 2px solid teal;
    width:100%;
    float:left;
}
.eleventh{
    height:50%;
    border: 2px solid teal;
    width:100%;
    float:left;
}


</style>


@section('content')

<center>
<h1>Booking Details</h1>
<a href="/user/my_bookings" class="py-12 text-xl text-teal-500 underline">Go Back</a>


<div class="first">
    <div class="second">
        <h2>REG No.: <br/>{{ $booking->schedule->company->registration_number }}</h2>
    </div>
    <div class="third">
        <div class="cname">{{ $booking->schedule->company->company_name }}</div>
        <div class="loc">{{ $booking->schedule->company->office_location }}</div>
    </div>
    <div class="fourth">
        Date: <br/>
        {{ $booking->schedule->date }}
    </div>
    <div class="fifth">
        {{ $booking->schedule->route->name }} <br/> Via: {{ $booking->schedule->route->via }} <br/> Ticket: {{ $booking->ticket_no }} <br/> {{ $booking->schedule->bus->type }}
    </div>
    <div class="sixth">
        <div class="seventh">Seats booked: {{ $booking->seats }}</div>
        <div class="eighth">Total Amount: {{ $booking->amount }} <br/> Status: @if($booking->paid) Paid @elseif($booking->payment_unique_id == "Hand Cash") Hand Cash @else Unpaid @endif</div>
    </div>
    {{-- @if($booking->paid) --}}
    <div class="ninth">
        <div class="tenth">Departure At: {{ $booking->schedule->departure_time }}</div>
        <div class="eleventh">Bus No.: {{ $booking->schedule->bus->number_plate }}</div>
    </div>
    {{-- @endif --}}
</div>

</center>

@endsection