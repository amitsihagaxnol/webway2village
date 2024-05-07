<?php

namespace App\Http\Controllers\Admin;

use DB, PDF, Session, Common, Excel;
use Illuminate\Http\Request;
use App\Http\Controllers\{
    Controller,
    EmailController
};
use App\DataTables\BookingsDataTable;
use App\Exports\BookingsExport;
use App\Models\{BankDate,
    Bookings,
    BookingDetails,
    PropertyDates,
    PropertyType,
    Properties,
    User,
    Currency,
    SpaceType,
    Payouts,
    Settings,
    PayoutSetting,
    Wallet
};
use Modules\DirectBankTransfer\Entities\DirectBankTransfer;

class BookingsController extends Controller
{

    public function index(BookingsDataTable $dataTable)
    {
        $data['from'] = isset(request()->from) ? request()->from : null;
        $data['to']   = isset(request()->to) ? request()->to : null;

        // Start with all bookings
        $query = Bookings::query();

        // Filter bookings based on status if status is provided
        if (isset(request()->status)) {
            $status = '%' . request()->status . '%'; // Add wildcards
            $query->where('status', 'LIKE', $status);
        }

        // Filter bookings based on user_id if provided
        if (isset(request()->user_id)) {
            $userId = request()->user_id; // Add wildcards
            $query->where('user_id', $userId);
        }

        // Fetch bookings based on constructed query
        $data['bookings'] = $query->get();

        return $dataTable->render('admin.bookings.view', $data);
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
        return view('admin.bookings.detail', compact('bookingDetail'));
    }

}
