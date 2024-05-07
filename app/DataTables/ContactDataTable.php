<?php

namespace App\DataTables;

use App\Models\Contact;
use Yajra\DataTables\Services\DataTable;

class ContactDataTable extends DataTable
{
    public function ajax()
    {
        return datatables()
            ->eloquent($this->query())
            ->addColumn('action', function ($contacts) {

                $edit = '<a href="' . url('admin/edit-page-contact/' . $contacts->id) . '" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>&nbsp;';
             //   $delete = '<a href="' . url('admin/delete-page/' . $contacts->id) . '" class="btn btn-xs btn-danger delete-warning"><i class="fa fa-trash"></i></a>';

                return $edit ;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function query()
    {
        $query = Contact::select();
        return $this->applyScopes($query);
    }

    public function html()
    {
        return $this->builder()
            ->addColumn(['data' => 'name',   'name' => 'contacts.name',   'title' => 'Name'])
            ->addColumn(['data' => 'meta_title',    'name' => 'contacts.meta_title',    'title' => 'Meta Title'])
            ->addColumn(['data' => 'meta_description', 'name' => 'contacts.meta_description', 'title' => 'Meta Description'])
            ->addColumn(['data' => 'email', 'name' => 'contacts.email', 'title' => 'Email'])
            ->addColumn(['data' => 'address', 'name' => 'contacts.address', 'title' => 'Address'])
            ->addColumn(['data' => 'status', 'name' => 'contacts.status', 'title' => 'Status'])
            ->addColumn(['data' => 'action', 'name' => 'action',       'title' => 'Action', 'orderable' => false, 'searchable' => false])
             ->parameters(dataTableOptions());
    }


    protected function filename()
    {
        return 'membersdatatables_' . time();
    }
}
