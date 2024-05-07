<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\FacilityDataTable;
use App\Models\Facility;

use Validator, Common, Cache;


class FacilityController extends Controller
{
    public function index(FacilityDataTable $dataTable)
    {

        return $dataTable->render('admin.facility.view');
    }

    public function add(Request $request)
    {
        if (! $request->isMethod('post')) {
            return view('admin.facility.add');
        } elseif ($request->isMethod('post')) {
            // dd($request->all());
            $rules = array(
                    'facility_code'          => 'required',
                    'name'          => 'required|max:100',
                    'description'   => 'required',
                    'price' => 'required',
                    'status' => 'required'
                    );

            $fieldNames = array(
                        'facility_code' => 'Facility Code',
                        'name' => 'Name',
                        'description'  =>'Description',
                        'price' => 'Price',
                        'status' => 'Status'
                        );

            $validator = Validator::make($request->all(), $rules);

            $validator->setAttributeNames($fieldNames);
            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            } else {


                $facility   = new Facility;
                $facility->facility_code  = $request->facility_code;
                $facility->name  = $request->name;
                $facility->description = $request->description;
                $facility->price = $request->price;
                $facility->status = $request->status;
                $facility->save();

                Common::one_time_message('success', 'Added Successfully.');
                return redirect('admin/facility');
            }
        }
    }

    public function update(Request $request)
    {
        if (! $request->isMethod('post')) {
             $data['result'] = Facility::find($request->id);
            return view('admin.facility.edit', $data);
        } elseif ($request->isMethod('post')) {
            $rules = array(
                        'facility_code'          => 'required',
                        'name'           => 'required|max:100',
                        'description'         => 'required',
                        'price'         => 'required',
                        'status' => 'required',
                    );

            $fieldNames = array(
                        'facility_code'          => 'required',
                        'name' => 'Name',
                        'description'  =>'Description',
                        'price' => 'Price',
                        'status' => 'Status'
                        );
            $validator = Validator::make($request->all(), $rules);
            $validator->setAttributeNames($fieldNames);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            } else {

                $facility  = Facility::find($request->id);
                $facility->facility_code  = $request->facility_code;
                $facility->name  = $request->name;
                $facility->description = $request->description;
                $facility->price = $request->price;
                $facility->status = $request->status;
                $facility->save();

              //  Cache::forget(config('cache.prefix') . 'activity.types.farm');
                Common::one_time_message('success', 'Updated Successfully');

                return redirect('admin/facility');
            }
        }
    }

    public function delete(Request $request)
    {

       $facility = Facility::find($request->id);
       if($facility->type!="Private")
       {
            Facility::find($request->id)->delete();
       }else{
        Facility::find($request->id)->delete();
       }

        Common::one_time_message('success', 'Deleted Successfully');

        return redirect('admin/facility');
    }
}
