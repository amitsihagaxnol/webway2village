<?php

namespace App\DataTables;

use App\Models\Properties;
use App\Models\FarmHouse;
use Yajra\DataTables\Services\DataTable;
use Request, Common;

class PropertyDataTable extends DataTable
{
    public function ajax()
    {
        $properties = $this->query();

        return datatables()
            ->of($properties)
           ->addColumn('featured_status', function ($properties) {
                if ($properties && isset($properties->id) && isset($properties->featured_status)) {
                    return '<div class="form-check form-switch">
                                <input class="form-check-input mySwitch" type="checkbox" id="mySwitch" name="darkmode" data-id="'.$properties->id.'" value="'.$properties->featured_status.'" '.($properties->featured_status == "yes" ? 'checked' : '').'>
                            </div>';
                }
               // Return an empty string if $property or its attributes are null

            })
            ->addColumn('action', function ($properties) {
                $edit = $delete = '';
                if ($properties) {
                    $edit = $delete = '';
                    if (Common::has_permission(\Auth::guard('admin')->user()->id, 'edit_properties')) {
                        $edit = '<a href="' . url('admin/listing/' . $properties->id) . '/basics" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>&nbsp;';
                    }
                    if (Common::has_permission(\Auth::guard('admin')->user()->id, 'delete_property')) {
                        $delete = '<a href="' . url('admin/delete-property/' . $properties->id) . '" class="btn btn-xs btn-danger delete-warning"><i class="fa fa-trash"></i></a>';
                    }
                    return $edit . $delete;
                }
                // Return an empty string if $property is null

            })
            ->addColumn('id', function ($properties) {
                if ($properties) {
                    return $properties->id;
                }
                // Return an empty string if $property is null

            })
            ->addColumn('host_name', function ($properties) {
                if ($properties && $properties->users) {
                    return '<a href="' . url('admin/edit-customer/' . $properties->users->id) . '">' . ucfirst($properties->users->first_name) . '</a>';
                }
                // Return an empty string if $property or its related user is null

            })
            ->addColumn('name', function ($properties) {
                if ($properties) {
                    return '<a href="' . url('admin/listing/' . $properties->id . '/basics') . '">' . ucfirst($properties->name) . '</a>';
                }
                // Return an empty string if $property is null

            })
            ->addColumn('created_at', function ($properties) {
                if ($properties && isset($properties->created_at)) {
                    return dateFormat($properties->created_at);
                }
                // Return an empty string if $property or its created_at attribute is null

            })
            ->addColumn('recomended', function ($properties) {
                 // Check if $property is not null and has a valid recomended attribute
                if ($properties && isset($properties->recomended)) {
                    return $properties->recomended == 1 ? 'Yes' : 'No';
                }
                // Return an empty string if $property or its recomended attribute is null


            })
            ->addColumn('verified', function ($properties) {

                if ($properties && isset($properties->is_verified)) {
                    return $properties->is_verified == 'Approved' || $properties->is_verified == '' ? 'Approved' : 'Pending';
                }
                // Return an empty string if $property or its is_verified attribute is null

                // return ($properties->is_verified == 'Approved' || $properties->is_verified == '') ? 'Approved' : 'Pending';

            })
            ->rawColumns(['host_name', 'name', 'featured_status','action'])
            ->make(true);
    }

    public function query()
    {
        $user_id    = Request::segment(4);

        $status     = isset(request()->status) ? request()->status : null;
        $from = isset(request()->from) ? setDateForDb(request()->from) : null;
        $to = isset(request()->to) ? setDateForDb(request()->to) : null;

        $properties = Properties::join('users as hosts', 'hosts.id', '=', 'properties.host_id')
        ->select([
            'properties.id as id',
            'properties.host_id as host_id',
            'hosts.first_name as host_name',
            'properties.name as property_name',
            'properties.status',
            'properties.featured_status',
            'properties.created_at',
            'properties.updated_at',
            'properties.deleted_at'
        ])
        ->whereNull('properties.deleted_at')
        ->get();

        return $this->applyScopes($properties);
    }

    public function html()
    {
        return $this->builder()
            ->addColumn(['data' => 'id', 'name' => 'properties.id', 'title' => 'Id'])
            ->addColumn(['data' => 'property_name', 'name' => 'property_name', 'title' => 'Property Name'])
            ->addColumn(['data' => 'host_name', 'name' => 'users.first_name', 'title' => 'Host Name'])
            ->addColumn(['data' => 'status', 'name' => 'status', 'title' => 'Status'])
            ->addColumn(['data' => 'created_at', 'name' => 'created_at', 'title' => 'Date'])
            ->addColumn(['data' => 'featured_status', 'name' => 'featured_status', 'title' => 'Featured Status'])
            ->addColumn(['data' => 'action', 'name' => 'action', 'title' => 'Action', 'orderable' => false, 'searchable' => false])
            ->parameters(dataTableOptions());
    }


    protected function filename()
    {
        return 'propertydatatables_' . time();
    }
}
