<?php

namespace App\DataTables;

use App\Models\Activity;
use App\Models\ActivityImage;
use Yajra\DataTables\Services\DataTable;

class ActivityDataTable extends DataTable
{
    public function ajax()
    {
        return datatables()
            ->eloquent($this->query())
            
             ->addColumn('banner_image', function ($activity) {
                    $imagesHtml ='';
                    if(isset($activity->banner_image))
                    {
                       $imagesHtml = ' &nbsp;<img src="' . url('public/images/activity/' . $activity->banner_image) . '" style="height:100px; width:60px;" >';
                    }
            
                return $imagesHtml;
            })
            
            ->addColumn('featured_image', function ($activity) {
                $imagesHtml = '';
                $images = ActivityImage::where('activity_id', $activity->id)->get();
                foreach ($images as $image) {
                    $imagesHtml .= ' &nbsp;<img src="' . url('public/images/activity/' . $image->image) . '" style="height:100px; width:60px;" >';
                }
            
                return $imagesHtml;
            })
             ->addColumn('state_id', function ($activity) {

              
                return $activity['state']->name;
            })
              ->addColumn('district_id', function ($activity) {

              
                return $activity['district']->name;
            })
            ->addColumn('action', function ($activity) {

                $edit = '<a href="' . url('admin/edit-activity/' . $activity->id) . '" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>&nbsp;';
                $delete = '<a href="' . url('admin/delete-activity/' . $activity->id) . '" class="btn btn-xs btn-danger delete-warning"><i class="fa fa-trash"></i></a>';

                return $edit . ' ' . $delete;
            })
            ->rawColumns(['banner_image','featured_image','action'])
            ->make(true);
    }

    public function query()
    {
        $query = Activity::with(['state','district']);
        return $this->applyScopes($query);
    }

    public function html()
    {
        return $this->builder()
            ->addColumn(['data' => 'name', 'name' => 'name', 'title' => 'Name'])
            ->addColumn(['data' => 'state_id', 'name' => 'state_id', 'title' => 'State'])
            ->addColumn(['data' => 'district_id', 'name' => 'district_id', 'title' => 'District'])
            ->addColumn(['data' => 'location', 'name' => 'location', 'title' => 'Location'])
            ->addColumn(['data' => 'banner_image', 'name' => 'banner_image', 'title' => 'Banner'])
            ->addColumn(['data' => 'featured_image', 'name' => 'featured_image', 'title' => 'Image'])
            ->addColumn(['data' => 'status', 'name' => 'status', 'title' => 'Status'])
            ->addColumn(['data' => 'action', 'name' => 'action', 'title' => 'Action', 'orderable' => false, 'searchable' => false])
             ->parameters(dataTableOptions());
    }

    protected function filename()
    {
        return 'activitytypedatatables_' . time();
    }
}
