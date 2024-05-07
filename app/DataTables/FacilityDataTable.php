<?php

namespace App\DataTables;

use App\Models\Facility;
use Yajra\DataTables\Services\DataTable;

class FacilityDataTable extends DataTable
{
    public function ajax()
    {
        $query = $this->query(); // Define the $query variable here

        return datatables()
            ->eloquent($query)
            ->addColumn('action', function ($facility) {

                $edit = '<a href="' . url('admin/edit-facility/' . $facility->id) . '" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>&nbsp;';
                $delete = '<a href="' . url('admin/delete-facility/' . $facility->id) . '" class="btn btn-xs btn-danger delete-warning"><i class="fa fa-trash"></i></a>';

                return $edit . ' ' . $delete;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function query()
    {
        return Facility::query()->select(['id', 'facility_code', 'name', 'description', 'price', 'status']); // Modify the query to select specific columns
    }

    public function html()
    {
        return $this->builder()
            ->addColumn(['data' => 'facility_code', 'name' => 'facility_code', 'title' => 'Facility Code'])
            ->addColumn(['data' => 'name', 'name' => 'name', 'title' => 'Name'])
            ->addColumn(['data' => 'description', 'name' => 'description', 'title' => 'Description'])
            ->addColumn(['data' => 'price', 'name' => 'price', 'title' => 'Price'])
            ->addColumn(['data' => 'status', 'name' => 'status', 'title' => 'Status'])
            ->addColumn(['data' => 'action', 'name' => 'action', 'title' => 'Action', 'orderable' => false, 'searchable' => false])
            ->parameters(dataTableOptions());
    }

    protected function filename()
    {
        return 'facilitytypedatatables_' . time();
    }
}
