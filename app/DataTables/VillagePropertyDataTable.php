<?php

namespace App\DataTables;

use App\Models\VillageProperties;
use App\Models\VillageFarmHouse;
use Yajra\DataTables\Services\DataTable;
use Request, Common;

class VillagePropertyDataTable extends DataTable
{
    public function ajax()
    {
        $properties = $this->query();

        return datatables()
            ->of($properties)
           ->addColumn('featured_status', function ($properties) {
                      return '<div class="form-check form-switch">
                                <input class="form-check-input mySwitch" type="checkbox" id="mySwitch" name="darkmode" data-id="'.$properties->id.'" value="'.$properties->featured_status.'" '.($properties->featured_status == "yes" ? 'checked' : '').'>
                            </div>';

                    })

            ->addColumn('action', function ($properties) {
                $edit = $delete = '';
                if (Common::has_permission(\Auth::guard('admin')->user()->id, 'edit_properties')) {
                    $edit = '<a href="' . url('admin/village-listing/' . $properties->id) . '/basics" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>&nbsp;';
                }
                if (Common::has_permission(\Auth::guard('admin')->user()->id, 'delete_property')) {
                    $delete = '<a href="' . url('admin/village-delete-property/' . $properties->id) . '" class="btn btn-xs btn-danger delete-warning"><i class="fa fa-trash"></i></a>';
                }
                return $edit . $delete;
            })
            ->addColumn('id', function ($properties) {
                return $properties->id;
            })
            ->addColumn('host_name', function ($properties) {
                return '<a href="' . url('admin/village-edit-customer/' . optional($properties->users)->id) . '">' . ucfirst(optional($properties->users)->first_name) . '</a>';
            })
            ->addColumn('name', function ($properties) {
                return '<a href="' . url('admin/village-listing/' . $properties->id . '/basics') . '">' . ucfirst($properties->name) . '</a>';
            })
            ->addColumn('created_at', function ($properties) {
                return dateFormat($properties->created_at);
            })
            ->addColumn('recomended', function ($properties) {

                if ($properties->recomended == 1) {
                    return 'Yes';
                }
                return 'No';

            })
            ->addColumn('verified', function ($properties) {

                return ($properties->is_verified == 'Approved' || $properties->is_verified == '') ? 'Approved' : 'Pending';

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
        $space_type = isset(request()->space_type) ? request()->space_type : null;
        $getAllPropertyId = [];
        if (request()->state || request()->district) {
            $query = VillageFarmHouse::query();

            if (request()->state) {
                $query->where('state_id', request()->state);
            }

            if (request()->district) {
                $query->where('district_id', request()->district);
            }

            $getAllPropertyId = $query->pluck('property_id')->toArray();
        }

        $query = VillageProperties::with(['users:id,first_name,profile_image']);
         if (request()->state || request()->district) {
             $query->whereIn('id',$getAllPropertyId);
         }
        if (isset($user_id)) {
            $query->where('host_id', '=', $user_id);
        }
         if(request()->user_id) {
                $query->where('host_id', request()->user_id);
         }



        if ($from) {
             $query->whereDate('created_at', '>=', $from);
        }
        if ($to) {
             $query->whereDate('created_at', '<=', $to);
        }
        if ($status) {
            $query->where('status', '=', $status);
        }
        if ($space_type) {
            $query->where('space_type', '=', $space_type);
        }
        return $this->applyScopes($query);
    }

    public function html()
    {
        return $this->builder()
            ->addColumn(['data' => 'id', 'name' => 'id', 'title' => 'Id'])
            ->addColumn(['data' => 'name', 'name' => 'name', 'title' => 'Name'])
            ->addColumn(['data' => 'host_name', 'name' => 'users.first_name', 'title' => 'Host Name'])
            ->addColumn(['data' => 'space_type_name', 'name' => 'space_type', 'title' => 'Space Type'])
            ->addColumn(['data' => 'status', 'name' => 'status', 'title' => 'Status'])
            ->addColumn(['data' => 'recomended', 'name' => 'recomended', 'title' => 'Recomended'])
            ->addColumn(['data' => 'verified', 'name' => 'verified', 'title' => 'Verified'])
            ->addColumn(['data' => 'created_at', 'name' => 'created_at', 'title' => 'Date'])
            ->addColumn(['data' => 'featured_status', 'name' => 'featured_status', 'title' => 'Featured Status'])
            ->addColumn(['data' => 'action', 'name' => 'action', 'title' => 'Action', 'orderable' => false, 'searchable' => false])
            ->parameters(dataTableOptions());
    }


    protected function filename()
    {
        return 'villagepropertydatatables_' . time();
    }
}
