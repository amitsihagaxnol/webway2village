<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\FarmTypeDataTable;
use App\Models\FarmType;
use Validator, Common, Cache;

class FarmTypeController extends Controller
{
    public function index(FarmTypeDataTable $dataTable)
    {
      
        return $dataTable->render('admin.farmTypes.view');
    }

    public function add(Request $request)
    {
        if (! $request->isMethod('post')) {
            return view('admin.farmTypes.add');
        } elseif ($request->isMethod('post')) {
            $rules = array(
                    'name'           => 'required|max:100',
                    'status'         => 'required'
                    );

            $fieldNames = array(
                        'name'              => 'Name',
                        'status'            => 'Status'
                        );

            $validator = Validator::make($request->all(), $rules);
            $validator->setAttributeNames($fieldNames);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            } else {
                $farmType                = new FarmType;
                $farmType->name          = $request->name;
              
                $farmType->status        = $request->status;
                $farmType->save();
                Cache::forget(config('cache.prefix') . '.farm.types.farm');
                Common::one_time_message('success', 'Added Successfully');
                return redirect('admin/settings/farm-type');
            }
        }
    }

    public function update(Request $request)
    {
        if (! $request->isMethod('post')) {
             $data['result'] = FarmType::find($request->id);

            return view('admin.farmTypes.edit', $data);
        } elseif ($request->isMethod('post')) {
            $rules = array(
                    'name'           => 'required|max:110',
                    'status'         => 'required'
                    );

            $fieldNames = array(
                        'name'              => 'Name',
                        'status'            => 'Status'
                        );
            $validator = Validator::make($request->all(), $rules);
            $validator->setAttributeNames($fieldNames);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            } else {
                $farmType  = FarmType::find($request->id);

                $farmType->name          = $request->name;
                $farmType->status        = $request->status;
                $farmType->save();

                Cache::forget(config('cache.prefix') . '.farm.types.farm');
                Common::one_time_message('success', 'Updated Successfully');

                return redirect('admin/settings/farm-type');
            }
        }
    }

    public function delete(Request $request)
    {
        
        FarmType::find($request->id)->delete();
        Cache::forget(config('cache.prefix') . '.farmType.types.farm');
        Common::one_time_message('success', 'Deleted Successfully');

        return redirect('admin/settings/farm-type');
    }
}
