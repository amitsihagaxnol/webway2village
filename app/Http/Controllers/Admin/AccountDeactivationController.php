<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\AccountDeactivationDataTable;
use App\Models\AccountDeactivation;
use Validator, Common, Cache;

class AccountDeactivationController extends Controller
{
    public function index(AccountDeactivationDataTable $dataTable)
    {
      
        return $dataTable->render('admin.accountDeactivations.view');
    }

    public function add(Request $request)
    {
        if (! $request->isMethod('post')) {
       
            return view('admin.accountDeactivations.add');
        } elseif ($request->isMethod('post')) {
            $rules = array(
                    'reason'           => 'required',
                    'status'         => 'required',
                    
                    );

            $fieldNames = array(
                        'reason'              => 'Reason',
                        'status'            => 'Status'
                        );

            $validator = Validator::make($request->all(), $rules);
            $validator->setAttributeNames($fieldNames);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            } else {
                
               
                $accountDeactivation   = new AccountDeactivation;
                $accountDeactivation->reason = $request->reason;
                $accountDeactivation->status   = $request->status;
                $accountDeactivation->save();
                Cache::forget(config('cache.prefix') . '.activity.types.farm');
                Common::one_time_message('success', 'Added Successfully');
                return redirect('admin/settings/account-deactivation');
            }
        }
    }

    public function update(Request $request)
    {
        if (! $request->isMethod('post')) {
             $data['result'] = AccountDeactivation::find($request->id);

            return view('admin.accountDeactivations.edit', $data);
        } elseif ($request->isMethod('post')) {
            $rules = array(
                    'reason'           => 'required',
                    'status'         => 'required'
                    );

            $fieldNames = array(
                        'reason'              => 'Reason',
                        'status'            => 'Status'
                        );
            $validator = Validator::make($request->all(), $rules);
            $validator->setAttributeNames($fieldNames);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            } else {
                $accountDeactivation  = AccountDeactivation::find($request->id);
              
               $accountDeactivation->reason = $request->reason;
                $accountDeactivation->status   = $request->status;
                $accountDeactivation->save();

              //  Cache::forget(config('cache.prefix') . 'activity.types.farm');
                Common::one_time_message('success', 'Updated Successfully');

                return redirect('admin/settings/account-deactivation');
            }
        }
    }

    public function delete(Request $request)
    {
        
        AccountDeactivation::find($request->id)->delete();
        Cache::forget(config('cache.prefix') . 'activity.types.farm');
        Common::one_time_message('success', 'Deleted Successfully');

        return redirect('admin/settings/account-deactivation');
    }
}
