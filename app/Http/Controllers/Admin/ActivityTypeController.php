<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\ActivityTypeDataTable;
use App\Models\ActivityType;
use Validator, Common, Cache;

class ActivityTypeController extends Controller
{
    public function index(ActivityTypeDataTable $dataTable)
    {
      
        return $dataTable->render('admin.activityTypes.view');
    }

    public function add(Request $request)
    {
        if (! $request->isMethod('post')) {
            return view('admin.activityTypes.add');
        } elseif ($request->isMethod('post')) {
            $rules = array(
                    'name'           => 'required|max:100',
                    'status'         => 'required',
                     'image' => 'required|image',
                    );

            $fieldNames = array(
                        'name'              => 'Name',
                        'image'              => 'Image',
                        'status'            => 'Status'
                        );

            $validator = Validator::make($request->all(), $rules);
            $validator->setAttributeNames($fieldNames);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            } else {
                
               
                $activityType   = new ActivityType;
                $activityType->name          = $request->name;
                if($request->hasfile('image'))
                {
                  
                    $file = $request->file('image');
                    $extenstion = $file->getClientOriginalExtension();
                    $filename ='activity-image'.time().'-'.date('Ymd').'.'.$extenstion;
                    $file->move('public/images/activity/', $filename);
                    $image = $filename;
                    $activityType->image = $image;
                }
               
                $activityType->status   = $request->status;
                $activityType->save();
                Cache::forget(config('cache.prefix') . '.activity.types.farm');
                Common::one_time_message('success', 'Added Successfully');
                return redirect('admin/settings/activity-type');
            }
        }
    }

    public function update(Request $request)
    {
        if (! $request->isMethod('post')) {
             $data['result'] = ActivityType::find($request->id);

            return view('admin.activityTypes.edit', $data);
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
                $activityType  = ActivityType::find($request->id);
                if($request->hasfile('image'))
                {
                   
                    $file = $request->file('image');
                    $extenstion = $file->getClientOriginalExtension();
                    $filename ='activity-image'.time().'-'.date('Ymd').'.'.$extenstion;
                   
                    $file->move('public/images/activity/', $filename);
                    $image = $filename;
                    $activityType->image = $image;
                }
                
                $activityType->name = $request->name;
                $activityType->status   = $request->status;
                $activityType->save();

              //  Cache::forget(config('cache.prefix') . 'activity.types.farm');
                Common::one_time_message('success', 'Updated Successfully');

                return redirect('admin/settings/activity-type');
            }
        }
    }

    public function delete(Request $request)
    {
        
        ActivityType::find($request->id)->delete();
        Cache::forget(config('cache.prefix') . 'activity.types.farm');
        Common::one_time_message('success', 'Deleted Successfully');

        return redirect('admin/settings/activity-type');
    }
}
