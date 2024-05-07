<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\RoomTypeDataTable;
use App\Models\FarmType;
use App\Models\RoomType;
use Validator, Common, Cache;

class RoomTypeController extends Controller
{
    public function index(RoomTypeDataTable $dataTable)
    {
        return $dataTable->render('admin.roomTypes.view');
    }

    public function add(Request $request)
    {
        if (! $request->isMethod('post')) {
            return view('admin.roomTypes.add');
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
                $roomType                = new RoomType();
                $roomType->name          = $request->name;

                $roomType->status        = $request->status;
                $roomType->save();
                Cache::forget(config('cache.prefix') . '.room.types.farm');
                Common::one_time_message('success', 'Added Successfully');
                return redirect('admin/settings/room-type');
            }
        }
    }

    public function update(Request $request)
    {
        if (! $request->isMethod('post')) {
             $data['result'] = RoomType::find($request->id);

            return view('admin.roomTypes.edit', $data);
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
                $farmType  = RoomType::find($request->id);

                $farmType->name          = $request->name;
                $farmType->status        = $request->status;
                $farmType->save();

                Cache::forget(config('cache.prefix') . '.room.types.farm');
                Common::one_time_message('success', 'Updated Successfully');

                return redirect('admin/settings/room-type');
            }
        }
    }

    public function delete(Request $request)
    {

        FarmType::find($request->id)->delete();
        Cache::forget(config('cache.prefix') . '.farmType.types.farm');
        Common::one_time_message('success', 'Deleted Successfully');

        return redirect('admin/settings/room-type');
    }
}
