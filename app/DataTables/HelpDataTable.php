<?php

namespace App\DataTables;

use App\Models\Help;
use Yajra\DataTables\Services\DataTable;

class HelpDataTable extends DataTable
{
    public function ajax()
    {
        return datatables()
            ->eloquent($this->query())
            ->addColumn('action', function ($help) {

                $edit = '<a href="' . url('admin/edit-page-contact/' . $help->id) . '" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>&nbsp;';
               $delete = '<a href="' . url('admin/delete-page-help/' . $help->id) . '" class="btn btn-xs btn-danger delete-warning"><i class="fa fa-trash"></i></a>';

                return $delete ;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function query()
    {
        $query = Help::select();
        return $this->applyScopes($query);
    }

    public function html()
    {
        return $this->builder()
            ->addColumn(['data' => 'type',   'name' => 'type',   'title' => 'Type'])
            ->addColumn(['data' => 'question',   'name' => 'question',   'title' => 'Question'])
            ->addColumn(['data' => 'answer',    'name' => 'answer',    'title' => 'Answer'])
            ->addColumn(['data' => 'status', 'name' => 'status', 'title' => 'Status'])
            ->addColumn(['data' => 'action', 'name' => 'action',       'title' => 'Action', 'orderable' => false, 'searchable' => false])
             ->parameters(dataTableOptions());
    }


    protected function filename()
    {
        return 'membersdatatables_' . time();
    }
}
