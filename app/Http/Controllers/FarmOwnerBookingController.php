<?php

namespace App\Http\Controllers;
use Auth, DB, Session, DateTime, Common;

use Illuminate\Http\Request;
use App\DataTables\FarmOwnerBookingsDataTable;
use Carbon\Carbon;
use App\Models\{
    Bookings,
};


class FarmOwnerBookingController extends Controller
{
    public function myBookings(FarmOwnerBookingsDataTable $dataTable)
    {

        $data = [];
        if (isset(request()->status)) {
            $status = '%' . request()->status . '%'; // Add wildcards
            $data['bookings'] = Bookings::where('host_id', Auth::user()->id)->where('status', 'LIKE', $status)->get();
        }
        if(isset(request()->customer_name)){
            $data['bookings'] = '%' . request()->customer_name . '%'; // Add wildcards
        }

        return $dataTable->render('booking.my_bookings', $data);

    }


    public function details($id)
    {
        $bookingDetail = Bookings::with([
            'users',            // User relation
            'host',             // Host relation
            'properties',       // Properties relation
            'reviews',          // Reviews relation
            'messages',         // Messages relation
            'currency',         // Currency relation
            'bank',             // Bank relation
            'bookingFacility',  // BookingFacility relation
            'bookingActivity',  // BookingActivity relation
        ])->find($id);

        // dd($bookingDetail);
        return view('booking.detail', compact('bookingDetail'));
    }
}
