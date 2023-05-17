<?php

namespace App\Http\Controllers;

use Carbon\Carbon;

require '../vendor/autoload.php';

use App\Models\Booking;
use Cixware\Esewa\Client;
use Cixware\Esewa\Config;
use Illuminate\Http\Request;

class EsewaController extends Controller
{
    public function esewa_pay(Request $request){
        $pid = uniqid();
        $successUrl = url('/payment/success');
        $failureUrl = url('/payment/failure');

        $config = new Config($successUrl, $failureUrl);

        $esewa = new Client($config);

        $booking = Booking::findOrFail($request['booking_id']);
        $booking->payment_unique_id = $pid;
        $booking->ticket_no = Carbon::createFromFormat('Y-m-d', $booking->schedule->date)->format('Ymd') . '-' .  $booking->schedule->company_id . 'c'. $booking->schedule->id . 's' . $booking->schedule->bus_id . 'b' . $booking->schedule->route_id . 'r' . $booking->id;
        $booking->save();

        $esewa->process($booking->payment_unique_id , $booking->amount, 0, 0, 0);

    }

    public function esewa_pay_success(){

        $oid = $_GET['oid'];
        $refId = $_GET['refId'];
        $amt = $_GET['amt'];

        $booking = Booking::where('payment_unique_id', $oid)->first();

        if ($booking->paid) {
            $msg = "Already Paid";
            return view('pages.response', compact('msg'));
        }

        $config = new Config(url('/payment/success'), url('/payment/failure'));
        $esewa = new Client($config);
        $status = $esewa->verify($refId, $oid, $amt);
    
        if ($status) {
            // payment was successful
            $msg = "Payment Successful";
            $booking->paid = true;
            $booking->save();
            return view('pages.response', compact('msg'));
        } else {
            // payment was not successful
            $booking->payment_unique_id = "Hand Cash";
            $msg = "Payment failed";
            return view('pages.response', compact('msg'));
        }
    }

    public function esewa_pay_failure(){
        $oid = $_GET['oid'];
        $booking = Booking::where('payment_unique_id', $oid)->first();
        $booking->payment_unique_id = "Hand Cash";
        $booking->save();

        $msg = "Payment failed";
        return view('pages.response', compact('msg'));
    }
}
