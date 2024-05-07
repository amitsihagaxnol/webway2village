<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bookings;


class FarmBookingController extends Controller
{
   public function storeBookingDetail(Request $request)
   {
        $userId = \Auth::user()->id;
        $bookingDetails = session()->get('booking_details');

        $newBooking = new Bookings();
        $newBooking->property_id = $bookingDetails['data']['property_id'];
        $newBooking->code = $bookingDetails['bookingNo'];
        $newBooking->user_id = $userId;
        $newBooking->start_date = $bookingDetails['data']['check_in_date'];
        $newBooking->end_date = $bookingDetails['data']['check_out_date'];
        $newBooking->status = 0;
        $newBooking->total_night = $bookingDetails['data']['totalNights'];
        $newBooking->base_price = $bookingDetails['data']['property_id'];
        $newBooking->total = $bookingDetails['data']['finalAmount'];

        if($newBooking->save())
        {
            $request->session()->forget('booking_details');

            // return redirect()->route('home')->with('success', 'Booking saved successfully!');
        } else {
            // Redirect back with error message if saving fails
            return back()->with('error', 'Failed to save booking details.');
        }
   }
}
