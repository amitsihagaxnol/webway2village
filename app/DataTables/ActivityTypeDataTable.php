<?php

namespace App\DataTables;

use App\Models\ActivityType;
use Yajra\DataTables\Services\DataTable;

class ActivityTypeDataTable extends DataTable
{
    public function ajax()
    {
        return datatables()
            ->eloquent($this->query())
            
             ->addColumn('image', function ($activityType) {

                $image = '<img src="' . url('public/images/activity/' . $activityType->image) . '" style="hight:px; width:60px;" >';
                $delete = '<a href="' . url('admin/settings/delete-activity-type/' . $activityType->id) . '" class="btn btn-xs btn-danger delete-warning"><i class="fa fa-trash"></i></a>';

                return $image;
            })
            ->addColumn('action', function ($activityType) {

                $edit = '<a href="' . url('admin/settings/edit-activity-type/' . $activityType->id) . '" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>&nbsp;';
                $delete = '<a href="' . url('admin/settings/delete-activity-type/' . $activityType->id) . '" class="btn btn-xs btn-danger delete-warning"><i class="fa fa-trash"></i></a>';

                return $edit . ' ' . $delete;
            })
            ->rawColumns(['image','action'])
            ->make(true);
    }

    public function query()
    {
        $query = ActivityType::query();
        return $this->applyScopes($query);
    }

    public function html()
    {
        return $this->builder()
            ->addColumn(['data' => 'name', 'name' => 'name', 'title' => 'Name'])
            ->addColumn(['data' => 'image', 'name' => 'image', 'title' => 'Image'])
            ->addColumn(['data' => 'status', 'name' => 'status', 'title' => 'Status'])
            ->addColumn(['data' => 'action', 'name' => 'action', 'title' => 'Action', 'orderable' => false, 'searchable' => false])
             ->parameters(dataTableOptions());
    }

    protected function filename()
    {
        return 'activitytypedatatables_' . time();
    }
}
