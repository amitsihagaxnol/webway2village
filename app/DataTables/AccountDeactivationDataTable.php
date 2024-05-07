<?php

namespace App\DataTables;

use App\Models\AccountDeactivation;
use Yajra\DataTables\Services\DataTable;

class AccountDeactivationDataTable extends DataTable
{
    public function ajax()
    {
        return datatables()
            ->eloquent($this->query())
            
            ->addColumn('action', function ($accountDeactivation) {

                $edit = '<a href="' . url('admin/settings/edit-account-deactivation/' . $accountDeactivation->id) . '" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>&nbsp;';
                $delete = '<a href="' . url('admin/settings/delete-account-deactivation/' . $accountDeactivation->id) . '" class="btn btn-xs btn-danger delete-warning"><i class="fa fa-trash"></i></a>';

                return $edit . ' ' . $delete;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function query()
    {
        $query = AccountDeactivation::query();
        return $this->applyScopes($query);
    }

    public function html()
    {
        return $this->builder()
            ->addColumn(['data' => 'reason', 'name' => 'reason', 'title' => 'Reason Title'])
            ->addColumn(['data' => 'status', 'name' => 'status', 'title' => 'Status'])
            ->addColumn(['data' => 'action', 'name' => 'action', 'title' => 'Action', 'orderable' => false, 'searchable' => false])
             ->parameters(dataTableOptions());
    }

    protected function filename()
    {
        return 'Accountdeactivationdatatables_' . time();
    }
}
