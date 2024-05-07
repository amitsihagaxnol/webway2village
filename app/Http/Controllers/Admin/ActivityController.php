<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\ActivityDataTable;
use App\Models\Activity;
use App\Models\ActivityImage;
use App\Models\ActivityType;
use App\Models\ActivityProduct;
use App\Models\State;
use App\Models\District;

use Validator, Common, Cache;

class ActivityController extends Controller
{
    public function index(ActivityDataTable $dataTable)
    {

        return $dataTable->render('admin.activity.view');
    }

    public function add(Request $request)
    {
        if (! $request->isMethod('post')) {

              $states = State::where('country_id',1)->get();
              $activities = ActivityType::where('status','active')->get();
           // $districts = District::get();

            return view('admin.activity.add')->with(compact('states','activities'));

        } elseif ($request->isMethod('post')) {


            $rules = array(
                    'name'           => 'required|max:100',
                    'activityType'           => 'required',
                    'type'           => 'required',
                    'state'           => 'required',
                    'district'           => 'required',
                    'district'           => 'required',
                    'location'         => 'required',
                    'description'         => 'required',
                    'promo_video'         => 'required',
                    'rules_and_regulations'         => 'required',
                     'featured_image' => 'required',
                     'status' => 'required',
                    );

            $fieldNames = array(
                        'name'              => 'Name',
                        'activityType'  =>'Activity Type',
                        'type'  =>'Type',
                        'state'  =>'State',
                        'district'  =>'District',
                        'location'  =>'Location',
                        'description'  =>'Description',
                        'promo_video'  =>'Promo Video',
                        'rules_and_regulations'  =>'Rules And Regulations',
                        'featured_image'              => 'Featured Image',
                        'status'            => 'Status'
                        );

            $validator = Validator::make($request->all(), $rules);
            $validator->setAttributeNames($fieldNames);
            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            } else {


                $activity   = new Activity;
                $activity->name          = $request->name;
                $activity->activity_type_id = $request->activityType;
                $activity->type = $request->type;
                $activity->state_id = $request->state;
                $activity->district_id = $request->district;
                $activity->location = $request->location;
                $activity->description = $request->description;
                $activity->promo_video = $request->promo_video;
                $activity->rules_and_regulations = $request->rules_and_regulations;
                $activity->rules_and_regulations = $request->rules_and_regulations;
                $activity->default_price = $request->default_price;
                $activity->meta_title = $request->meta_title;
                $activity->meta_keywords = $request->meta_keywords;
                $activity->meta_description = $request->meta_description;
                if($request->hasfile('banner_image'))
                {

                    $file = $request->file('banner_image');
                    $extenstion = $file->getClientOriginalExtension();
                    $filename ='activity-image'.time().'-'.date('Ymd').'.'.$extenstion;
                    $file->move('public/images/activity/', $filename);
                    $image = $filename;
                    $activity->banner_image = $image;
                }

                $activity->status   = $request->status;
                 $activity->save();
                if($activity->type!="Private")
                {

                    $iteams = $request->input('iteam');
                    $durations = $request->input('duration');
                    $amounts = $request->input('amount');


                    $i=0;
                    foreach($iteams as $iteam)
                    {
                        $activityProduct = new ActivityProduct;
                        $activityProduct->activity_id = $activity->id;
                        $activityProduct->item_name = $iteam;
                        $activityProduct->duration = $durations[$i];
                        $activityProduct->amount = $amounts[$i];
                        $activityProduct->save();
                        $i++;
                    }

                }

                if ($request->hasFile('featured_image')) {
                    $images = $request->file('featured_image');

                    foreach ($images as $image) {
                        $extension = $image->getClientOriginalExtension();
                        $filename = 'activity-image-' . time() . '-' . date('Ymd') . rand(1000,9999).'.' . $extension;
                        $image->move('public/images/activity/', $filename);
                        // $imagePath = 'public/images/activity/' . $filename;

                        $activityImage = new ActivityImage();
                        $activityImage->activity_id = $activity->id;
                        $activityImage->image = $filename;
                        $activityImage->save();
                    }
                }


                Common::one_time_message('success', 'Added Successfully.');
                return redirect('admin/activity');
            }
        }
    }

    public function update(Request $request)
    {
        if (! $request->isMethod('post')) {
             $data['result'] = Activity::with(['activity_products'])->find($request->id);
             $data['districts'] = District::where('state_id',$data['result']->state_id)->get();
             $data['states'] = State::where('country_id',1)->get();
             $data['activities'] = ActivityType::where('status','active')->get();

            return view('admin.activity.edit', $data);
        } elseif ($request->isMethod('post')) {
            $rules = array(
                    'name'           => 'required|max:100',
                    'activityType'           => 'required',
                    'type'           => 'required',
                    'state'           => 'required',
                    'district'           => 'required',
                    'district'           => 'required',
                    'location'         => 'required',
                    'description'         => 'required',
                    'promo_video'         => 'required',
                    'rules_and_regulations'         => 'required',
                     'status' => 'required',
                    );

            $fieldNames = array(
                        'name'              => 'Name',
                        'activityType'  =>'Activity Type',
                        'type'  =>'Type',
                        'state'  =>'State',
                        'district'  =>'District',
                        'location'  =>'Location',
                        'description'  =>'Description',
                        'promo_video'  =>'Promo Video',
                        'rules_and_regulations'  =>'Rules And Regulations',
                        'status'            => 'Status'
                        );
            $validator = Validator::make($request->all(), $rules);
            $validator->setAttributeNames($fieldNames);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            } else {

                $activity  = Activity::find($request->id);
                $activity->name          = $request->name;
                $activity->activity_type_id = $request->activityType;
                $activity->type = $request->type;
                $activity->state_id = $request->state;
                $activity->district_id = $request->district;
                $activity->location = $request->location;
                $activity->description = $request->description;
                $activity->promo_video = $request->promo_video;
                $activity->rules_and_regulations = $request->rules_and_regulations;
                $activity->rules_and_regulations = $request->rules_and_regulations;
                $activity->default_price = $request->default_price;
                $activity->meta_title = $request->meta_title;
                $activity->meta_keywords = $request->meta_keywords;
                $activity->meta_description = $request->meta_description;
                if($request->hasfile('banner_image'))
                {

                    $file = $request->file('banner_image');
                    $extenstion = $file->getClientOriginalExtension();
                    $filename ='activity-image'.time().'-'.date('Ymd').'.'.$extenstion;
                    $file->move('public/images/activity/', $filename);
                    $image = $filename;
                    $activity->banner_image = $image;
                }

                $activity->status   = $request->status;
                 $activity->save();
                if($activity->type!="Private")
                {

                    $iteams = $request->input('iteam');
                    $durations = $request->input('duration');
                    $amounts = $request->input('amount');


                    $i=0;
                    foreach($iteams as $iteam)
                    {
                        $activityProduct = new ActivityProduct;
                        $activityProduct->activity_id = $activity->id;
                        $activityProduct->item_name = $iteam;
                        $activityProduct->duration = $durations[$i];
                        $activityProduct->amount = $amounts[$i];
                        $activityProduct->save();
                        $i++;
                    }

                }else{
                    ActivityProduct::where('activity_id',$request->id)->delete();
                }
                  if ($request->hasFile('featured_images')) {
                          ActivityImage::where('activity_id',$request->id)->delete();
                  }

                if ($request->hasFile('featured_images')) {

                     $images = $request->file('featured_images');

                    foreach ($images as $image) {
                        $extension = $image->getClientOriginalExtension();
                        $filename = 'activity-image-' . time() . '-' . date('Ymd') .rand(1000,9999). '.' . $extension;
                        $image->move('public/images/activity/', $filename);
                        // $imagePath = 'public/images/activity/' . $filename;

                        $activityImage = new ActivityImage();
                        $activityImage->activity_id = $activity->id;
                        $activityImage->image = $filename;
                        $activityImage->save();
                    }
                }



              //  Cache::forget(config('cache.prefix') . 'activity.types.farm');
                Common::one_time_message('success', 'Updated Successfully');

                return redirect('admin/activity');
            }
        }
    }

    public function delete(Request $request)
    {

       $activity = Activity::find($request->id);
       if($activity->type!="Private")
       {
           Activity::find($request->id)->delete();
           ActivityProduct::where('activity_id',$request->id)->delete();
       }else{
          Activity::find($request->id)->delete();
       }

        Cache::forget(config('cache.prefix') . 'activity.farm');
        Common::one_time_message('success', 'Deleted Successfully');

        return redirect('admin/activity');
    }
}
