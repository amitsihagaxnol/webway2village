<?php
namespace App\Http\Controllers;

use Auth, DB, Session, DateTime, Common;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\{
    Controller,
    EmailController
};
use App\Models\{
    Bank,
    Bookings,
    BookingDetails,
    Messages,
    Penalty,
    Payouts,
    Page,
    Properties,
    PayoutPenalties,
    PropertyDates,
    PropertyFees,
    Settings,
    Currency,
    Country,
    Contact,
    ActivityType,
    Activity
};
use Modules\Gateway\Entities\GatewayModule;

class ActivityControllersdf extends Controller
{
    private $helper;

    public function __construct()
    {
        $this->helper = new Common;
    }

    public function activity(){

        $data['activityTypes'] = ActivityType::where('status','active')->get();
        $data['activities']   = Activity::where('status','active')->get();
        return view('home.activity')->with(compact('data'));

    }

    public function typeWiseActivity(Request $request){
          $activity_type_id = $request->input('activity_type_id');
          $data['activities']   = Activity::where(['activity_type_id'=>$activity_type_id ,'status'=>'active'])->get();
          return view('home.ajax-activity')->with(compact('data'));


    }

    public function activityDetails($id){

         $id = base64_decode($id);
         $activity  = Activity::with(['activity_products','activity_images'])->where(['id'=>$id,'status'=>'active'])->first();

         return view('home.activity-details')->with(compact('activity'));
    }


}
