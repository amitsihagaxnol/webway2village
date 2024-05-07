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
    Help
};
use Modules\Gateway\Entities\GatewayModule;

class CmsPageController extends Controller
{
    private $helper;

    public function __construct()
    {
        $this->helper = new Common;
    }
    
    public function privacy(){
        
        $privacies = Page::where('name','Privacy')->first();
        
        return view('home.privacy')->with(compact('privacies'));
    }
    
     public function terms(){
         
        $terms = Page::where('name','Terms')->first();
        return view('home.terms')->with(compact('terms'));
    }
    public function user_policies(){
         $user_policies = Page::where('name','User Policies')->first();
        return view('home.user_policies')->with(compact('user_policies'));
    }
    public function refund(){
         $refunds = Page::where('name','Refund')->first();
        return view('home.refund')->with(compact('refunds'));
    }
    
    public function disclaimer(){
        $disclaimer = Page::where('name','Disclaimer')->first();
        return view('home.disclaimer')->with(compact('disclaimer'));
    }
    
    public function about(){
         $about = Page::where('name','About')->first();
         return view('home.about')->with(compact('about'));
    }
    
    public function contact(){
         $contact = Contact::where('status','active')->first();
         return view('home.contact')->with(compact('contact'));
    }
    
    
     public function payment_policies(){
             $payment_policies = Page::where('name','Payment Policies')->first();
         return view('home.payment_policies')->with(compact('payment_policies'));
    }
    
    public function help(){
         $helps = Help::where('status','active')->get();
          return view('home.help')->with(compact('helps'));
    }

  
}
