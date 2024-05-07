<?php

namespace App\DataTables;

use App\Models\Bookings;
use Yajra\DataTables\Services\DataTable;
use Request;

class BookingsDataTable extends DataTable
{
    public function ajax()
{
    $bookings = $this->query();
    $total = $bookings->count();

    return datatables()
        ->of($bookings)
        ->addColumn('property_name', function ($bookings) {
            return '<a href="' . url('admin/listing/' . $bookings->property_id . '/basics') . '">' . ucfirst($bookings->property_name) . '</a>';
        })
        ->addColumn('created_at', function ($bookings) {
            return dateFormat($bookings->created_at);
        })
        ->addColumn('status', function ($bookings) {
            $status = $bookings->status;
            if (!$status == 'Accepted' && !$status == 'Pending') {
                if ($bookings->check_guest_payout == 'yes') {
                    $status = $bookings->status . "<br/><span class='label label-info'>Refund</span>";
                }
            }
            return $status ;
        })
        ->addColumn('action', function ($bookings) {
            $edit = '<a href="' . url('admin/bookings/detail/' . $bookings->id) . '" class="btn btn-xs btn-primary" title="Detail View"><i class="fa fa-pencil"></i></a>&nbsp;';
            $genPdf = '<a href="" class="btn btn-xs btn-danger"><i class="fa fa-file-pdf-o"></i></a>';
            return $edit . ' ' . $genPdf;

        })
        ->rawColumns(['property_name', 'action'])
        ->setTotalRecords($total) // Set the total records
        ->make(true);
}


    public function query()
    {
        $user_id = Request::segment(4);
        $status = isset(request()->status) ? request()->status : null;
        $from = isset(request()->from) ? setDateForDb(request()->from) : null;
        $to = isset(request()->to) ? setDateForDb(request()->to) : null;
        $property = isset(request()->property) ? request()->property : null;
        $customer = isset(request()->customer) ? request()->customer : null;
        $userId = isset(request()->user_id) ? request()->user_id : null;

        $query = Bookings::query();
        if (!empty($userId)) {
            $query->where('user_id', $userId);
        }
        $bookings = $query->join('properties', 'properties.id', '=', 'bookings.property_id')
            ->join('users as hosts', 'hosts.id', '=', 'properties.host_id') // Join with the users table as hosts
            ->join('users', 'users.id', '=', 'bookings.user_id')
            ->select([
                'bookings.id as id',
                'properties.host_id as host_id', // Update to use properties.user_id
                'hosts.first_name as host_name',
                'users.first_name as guest_name',
                'bookings.property_id as property_id',
                'properties.name as property_name',
                'bookings.status',
                'bookings.code',
                'bookings.total_price',
                'bookings.created_at as created_at',
                'bookings.updated_at as updated_at',
                'bookings.start_date',
                'bookings.end_date',
                'users.id as user_id',
                'users.phone as phone',
                'bookings.currency_code'
            ])
            ->where('bookings.status', $status)
            ->where('users.first_name', 'like', "%$customer%") // Assuming 'first_name' is the column for customer's first name
            ->orWhere('users.last_name', 'like', "%$customer%") // Also check last name if needed
            ->get();


        return $this->applyScopes($bookings);
    }

    public function html()
    {
        return $this->builder()
        ->addColumn(['data' => 'id', 'name' => 'bookings.id', 'title' => 'ID']) // Display ID column
        ->addColumn(['data' => 'code', 'name' => 'code', 'title' => 'Booking Ref No'])
        ->addColumn(['data' => 'start_date', 'name' => 'start_date', 'title' => 'Booking Date'])
        ->addColumn(['data' => 'status', 'name' => 'status', 'title' => 'Booking Status'])
        ->addColumn(['data' => 'property_name', 'name' => 'properties.name', 'title' => 'Property Name'])
        ->addColumn(['data' => 'phone', 'name' => 'phone', 'title' => 'Customer Phone No'])
        ->addColumn(['data' => 'created_at', 'name' => 'bookings.created_at', 'title' => 'Date'])
        ->addColumn(['data' => 'action', 'name' => 'action', 'title' => 'Action', 'orderable' => false, 'searchable' => false])
        ->parameters(dataTableOptions());

    }


    protected function filename()
    {
        return 'bookingsdatatables_' . time();
    }
}
