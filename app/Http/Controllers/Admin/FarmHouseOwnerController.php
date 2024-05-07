<?php
/**
 * Customer Controller
 *
 * Customer Controller manages Customer by admin.
 *
 * @category   Customer
 * @package    vRent
 * @author     Techvillage Dev Team
 * @copyright  2020 Techvillage
 * @license
 * @version    2.7
 * @link       http://techvill.net
 * @email      support@techvill.net
 * @since      Version 1.3
 * @deprecated None
 */

namespace App\Http\Controllers\Admin;

use PDF, DB, Session, Validator, Common, Excel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\EmailController;
use App\Exports\CustomersExport;
use App\DataTables\{
    FarmHouseOwnerDataTable,
    PropertyDataTable,
    BookingsDataTable,
    PayoutsDataTable,
    WalletsDataTable
};
use App\Models\{
    User,
    UsersVerification,
    Wallet,
    Properties,
    SpaceType,
    Settings,
    Accounts,
    Country,
    Bookings,
    Messages,
    State,
    District,
    UserDocument
};

class FarmHouseOwnerController extends Controller
{

    public function index(FarmHouseOwnerDataTable $dataTable)
    {
        
        $data['from'] = isset(request()->from) ? request()->from : null;
        $data['to']   = isset(request()->to) ? request()->to : null;


        if (isset(request()->customer)) {
            $data['customers'] = User::where('users.id', request()->customer )->select('id', 'first_name', 'last_name')->get();
        } else {
            $data['customers'] = null;
        }

        if (isset(request()->reset_btn)) {
            $data['from']        = null;
            $data['to']          = null;
            $data['allstatus']   = '';
            $data['allcustomers']   = '';
            return $dataTable->render('admin.farmHouseOwners.view', $data);
        }
        $pref = Settings::getAll()->where('type', 'preferences');
        if (! empty($pref)) {
            foreach ($pref as $value) {
                $prefer[$value->name] = $value->value;
            }
            Session::put($prefer);
        }

        isset(request()->customer) ? $data['allcustomers'] = request()->customer : $data['allcustomers']    = '';
        isset(request()->status) ? $data['allstatus'] = $allstatus = request()->status : $data['allstatus'] = $allstatus = '';

        return $dataTable->render('admin.farmHouseOwners.view', $data);
    }

    public function searchCustomer(Request $request)
    {
        $str = $request->term;

        if ($str == null) {
            $myresult = User::select('id', 'first_name', 'last_name')->take(5)->get();
        } else {
            $myresult = User::where('users.first_name', 'LIKE', '%'.$str.'%')->orWhere('users.last_name', 'LIKE', '%'.$str.'%')->select('users.id','users.first_name', 'users.last_name')->get();
        }

        if ($myresult->isEmpty()) {
            $myArr=null;
        } else {
            $arr2 = array(
                "id"   => "",
                "text" => "All"
              );
              $myArr[] = ($arr2);
            foreach ($myresult as $result) {
                $arr = array(
                  "id"   => $result->id,
                  "text" => $result->first_name." ".$result->last_name
                );
                $myArr[] = ($arr);
            }
        }
        return $myArr;
    }

    public function add(Request $request, EmailController $email_controller)
    {
        if (! $request->isMethod('post')) {
            
            $states = State::where('country_id',1)->get();
            $districts = District::get();
            return view('admin.farmHouseOwners.add')->with(compact('states','districts'));
        } elseif ($request->isMethod('post')) {
           // dd($request->all());
            $rules = array(
                'first_name'    => 'required|max:255',
                'last_name'     => 'required|max:255',
                'email'         => 'required|max:255|email|unique:users',
                'password'      => 'required|min:6',
                'state'      => 'required',
                'district'      => 'required',
                'location'      => 'required',
               
            );

            $fieldNames = array(
                'first_name'    => 'First_name',
                'last_name'     => 'Last_name',
                'email'         => 'Email',
                'password'      => 'Password',
                'state'      => 'State',
                'district'      => 'District',
                'location'      => 'Location'
            );

            $validator = Validator::make($request->all(), $rules);
            $validator->setAttributeNames($fieldNames);

            if ($validator->fails()) {
             
                return back()->withErrors($validator)->withInput();
            } else {
              
                $user                  = new User;
                $user->first_name      = strip_tags($request->first_name);
                $user->last_name       = strip_tags($request->last_name);
                $user->email           = $request->email;
                $user->password        = \Hash::make($request->password);
                $user->status          = $request->status;
                $user->profile_image   = NULL;
                $formattedPhone        = str_replace('+' . $request->carrier_code, "", $request->formatted_phone);
                $user->phone           = !empty($request->phone) ? preg_replace("/[\s-]+/", "", $formattedPhone) : NULL;
                $user->default_country = isset($request->default_country) ? $request->default_country : NULL;
                $user->carrier_code    = isset($request->carrier_code) ? $request->carrier_code : NULL;
                $user->formatted_phone = isset($request->formatted_phone) ? $request->formatted_phone : NULL;
                $user->state_id = isset($request->state) ? $request->state : NULL;
                $user->district_id = isset($request->district) ? $request->district : NULL;
                $user->location = isset($request->location) ? $request->location : NULL;
                $user->account_verification_status = $request->account_verification_status;
                $user->save();


                $user_verification           = new UsersVerification;
                $user_verification->user_id  =   $user->id;
                $user_verification->save();
                $this->wallet($user->id);
                $errorMessage = '';
                try {

                    $email_controller->welcome_email($user);

                } catch (\Exception $e) {

                    $errorMessage = ' Email was not sent due to '.$e->getMessage();

                }

                Common::one_time_message('success', 'Added Successfully.'.''.$errorMessage);
                return redirect('admin/farm-house-owners');
            }
        }
    }

    public function ajaxCustomerAdd(Request $request, EmailController $email_controller)
    {
        $data = [];
        if ($request->isMethod('post')) {
            $rules = array(
                'first_name'    => 'required|max:255',
                'last_name'     => 'required|max:255',
                'email'         => 'required|max:255|email|unique:users',
                'password'      => 'required|min:6'
            );

            $fieldNames = array(
                'first_name'    => 'First_name',
                'last_name'     => 'Last_name',
                'email'         => 'Email',
                'password'      => 'Password'
            );

            $validator = Validator::make($request->all(), $rules);
            $validator->setAttributeNames($fieldNames);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            } else {
                $user                  = new User;
                $user->first_name      = $request->first_name;
                $user->last_name       = $request->last_name;
                $user->email           = $request->email;
                $user->password        = \Hash::make($request->password);
                $user->status          = $request->status;
                $user->profile_image   = NULL;
                $formattedPhone        = str_replace('+' . $request->carrier_code, "", $request->formatted_phone);
                $user->phone           = !empty($request->phone) ? preg_replace("/[\s-]+/", "", $formattedPhone) : NULL;
                $user->default_country = isset($request->default_country) ? $request->default_country : NULL;
                $user->carrier_code    = isset($request->carrier_code) ? $request->carrier_code : NULL;
                $user->formatted_phone = isset($request->formatted_phone) ? $request->formatted_phone : NULL;
                $user->save();
                $this->wallet( $user->id);

                $user_verification           = new UsersVerification;
                $user_verification->user_id  =   $user->id;
                $user_verification->save();

                $data = ['status' => 1,'user' => $user];
            }
        return $data;
     }
   }
    public function customerProperties(PropertyDataTable $dataTable, $id)
    {
        $data['properties_tab'] = 'active';
        $data['user'] = DB::table('users')->where('id',$id)->first();

        $data['from'] = isset(request()->from) ? request()->from:null;
        $data['to']   = isset(request()->to) ? request()->to:null;
        $data['space_type_all'] = SpaceType::all('id','name');


        if (isset(request()->reset_btn)) {
            $data['from']        = null;
            $data['to']          = null;
            $data['allstatus']   = '';
            $data['allSpaceType']   = '';
            return $dataTable->render('admin.farmHouseOwnerDetails.properties',$data);
        }
        isset(request()->status) ? $data['allstatus'] = $allstatus = request()->status : $data['allstatus'] = $allstatus = '';
        isset(request()->space_type) ? $data['allSpaceType'] = request()->space_type : $data['allSpaceType']  = '';

        return $dataTable->render('admin.farmHouseOwnerDetails.properties',$data);

    }

    public function customerBookings(BookingsDataTable $dataTable, $id)
    {
        $data['bookings_tab'] = 'active';
        $data['user']         = DB::table('users')->where('id',$id)->first();

        $data['from'] = isset(request()->from)?request()->from:null;
        $data['to'] = isset(request()->to)?request()->to:null;
        if (isset(request()->property)) {
            $data['properties'] = Properties::where('properties.id',request()->property )->select('id', 'name')->get();
        } else {
            $data['properties'] = null;
        }
        if (isset(request()->reset_btn)) {
            $data['from']        = null;
            $data['to']          = null;
            $data['allstatus']   = '';
            $data['allproperties']   = '';
            return $dataTable->render('admin.farmHouseOwnerDetails.bookings', $data);
        }

        isset(request()->property) ? $data['allproperties'] = request()->property : $data['allproperties'] = '';
        isset(request()->status) ? $data['allstatus'] = request()->status : $data['allstatus'] = '';
        return $dataTable->render('admin.farmHouseOwnerDetails.bookings', $data);

    }

    public function customerPayouts(PayoutsDataTable $dataTable, $id)
    {
        $data['payouts_tab'] = 'active';
        $data['user'] = DB::table('users')->where('id',$id)->first();

        $data['from'] = isset(request()->from)?request()->from:null;
        $data['to'] = isset(request()->to)?request()->to:null;
        if (isset(request()->property)) {
            $data['properties'] = Properties::where('properties.id',request()->property )->select('id', 'name')->get();
        } else {
            $data['properties'] = null;
        }

        if (isset(request()->reset_btn)) {
            $data['from']        = null;
            $data['to']          = null;
            $data['allstatus']   = '';
            $data['alltypes']   = '';
            $data['allproperties']   = '';
            return $dataTable->render('admin.farmHouseOwnerDetails.payouts', $data);
        }
        isset(request()->property) ? $data['allproperties'] = request()->property : $data['allproperties'] = '';
        isset(request()->status) ? $data['allstatus'] = request()->status : $data['allstatus'] = '';
        isset(request()->types) ? $data['alltypes'] = request()->types : $data['alltypes'] = '';

        return $dataTable->render('admin.farmHouseOwnerDetails.payouts', $data);
    }

    public function paymentMethods($id)
    {
        $data['payment_methods_tab'] = 'active';
        $data['user'] = DB::table('users')->where('id',$id)->first();

        $data['payouts']  = Accounts::where('user_id', $id)->orderBy('id','desc')->get();
        $data['country']  = Country::all()->pluck('name','short_name');

        return view('admin.farmHouseOwnerDetails.payment_methods', $data);
    }

    public function update(Request $request)
    {
        $data['user'] = DB::table('users')->where('id',$request->id)->first();

        if (! $request->isMethod('post')) {
            $data['customer_edit_tab'] = 'active';
            $data['form_name'] = 'Edit Customer';
            $data['states'] = State::where('country_id',1)->get();
            $data['districts'] = District::where('state_id',$data['user']->state_id)->get();
           
            return view('admin.farmHouseOwners.edit', $data);

        } elseif ($request->isMethod('post')) {
            $rules = array(
                'first_name'    => 'required|max:255',
                'last_name'     => 'required|max:255',
                'email'       => 'required|max:255|email|unique:users,email,'.$data['user']->id,
                'state'      => 'required',
                'district'      => 'required',
                'location'      => 'required',

            );
             $messages = array(
                'email' => 'Email already existed.',

            );


            $fieldNames = array(
                'first_name'    => 'First Name',
                'last_name'     => 'Last Name',
                 'email'        => 'Email',
                  'state'      => 'State',
                'district'      => 'District',
                'location'      => 'Location'

            );

            $validator = Validator::make($request->all(), $rules, $messages);
            $validator->setAttributeNames($fieldNames);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            } else {
                $booking               = Bookings::where('host_id','=',$request->customer_id)->orWhere('user_id','=',$request->customer_id)->whereDate('end_date','>', now())->count();
                $user                  = User::find($request->customer_id);
                $user->first_name      = strip_tags($request->first_name);
                $user->last_name       = strip_tags($request->last_name);
                $user->email           = $request->email;
                $user->status          = $request->status;
                $user->profile_image   = NULL;
                $formattedPhone        = str_replace('+' . $request->carrier_code, "", $request->formatted_phone);
                $user->phone           = !empty($request->phone) ? preg_replace("/[\s-]+/", "", $formattedPhone) : NULL;
                $user->default_country = isset($request->default_country) ? $request->default_country : NULL;
                $user->carrier_code    = isset($request->carrier_code) ? $request->carrier_code : NULL;
                $user->formatted_phone = isset($request->formatted_phone) ? $request->formatted_phone : NULL;
                $user->state_id = isset($request->state) ? $request->state : NULL;
                $user->district_id = isset($request->district) ? $request->district : NULL;
                $user->location = isset($request->location) ? $request->location : NULL;
                $user->account_verification_status = $request->account_verification_status;
                if ($request->password != '')
                    $user->password = bcrypt($request->password);

                if ($booking > 0 && $user->status == 'Inactive') {

                    Common::one_time_message('danger', "User Can't be Inactive Due to have booking");
                    return redirect('admin/farm-house-owners');

                } else {

                    $user->save();

                    Common::one_time_message('success', 'Updated Successfully');
                    return redirect('admin/farm-house-owners');
                }

            }
        }
    }
    public function delete(Request $request)
    {
        $propertiesWithBookingsCount = Bookings::where('host_id', $request->id)->where('end_date','>=', date('Y-m-d'))->where('status','Accepted')->count();
        $bookingsCount   = Bookings::where('user_id', $request->id)->where('end_date','>=', date('Y-m-d'))->where('status','Accepted')->count();

        if (env('APP_MODE', '') != 'test') {
            if (($propertiesWithBookingsCount) && ($bookingsCount) > 0) {
                Common::one_time_message('danger', 'Sorry, can not possible to delete it due to both customer properties and customer have reservations.');
            } elseif ($propertiesWithBookingsCount > 0) {
                Common::one_time_message('danger', 'Sorry can not possible to delete it due to customer properties have reservations.');
            } elseif ($bookingsCount > 0) {
                Common::one_time_message('danger', 'Sorry can not possible to delete it due to customer have reservations.');
            } else {
                $user = User::find($request->id);
                if (!empty($user)) {

                    $user->payouts()->update(['deleted_at' => now()]);
                    $user->reviews()->where(['sender_id' => $request->id])->orWhere(['receiver_id' => $request->id])->update(['deleted_at' => now()]);
                    $user->bookings()->where(['user_id' => $request->id])->orWhere(['host_id' => $request->id])->update(['deleted_at' => now()]);
                    $user->properties()->update(['deleted_at' => now()]);
                    $user->withdraw()->update(['deleted_at' => now()]);

                    Messages::where(['sender_id' => $request->id])->orWhere(['receiver_id' => $request->id])->update(['deleted_at' => now()]);
                    Wallet::where('user_id', $request->id)->update(['is_active' => '0']);

                    $user->delete();
                    Common::one_time_message('success', 'Deleted Successfully');
                } else {
                    Common::one_time_message('success', 'Deleted Successfully');
                }
            }
        }

        return redirect('admin/farm-house-owners');
    }

    public function customerCsv()
    {
        return Excel::download(new CustomersExport, 'customer_sheet' . time() .'.xls');
    }

    public function customerPdf()
    {
        $to                   = setDateForDb(request()->to);
        $from                 = setDateForDb(request()->from);
        $customer             = isset(request()->customer) ? request()->customer : null;

        $data['status']     = $status = isset(request()->status) ? request()->status : null;
        $query= User::orderBy('id', 'desc')->select();

        if ($from) {
            $query->whereDate('created_at', '>=', $from);
        }
        if ($to) {
            $query->whereDate('created_at', '<=', $to);
        }
        if ($status){
            $query->where('status','=',$status);
        }
        if ($customer){
            $query->where('id','=',$customer);
        }
        if ($from && $to){
          $data['date_range'] = onlyFormat($from) . ' To ' . onlyFormat($to);
        }

        $data['customerList'] = $query->get();
        $pdf = PDF::loadView('admin.customers.list_pdf', $data, [], [
            'format' => 'A3', [750, 1060]
          ]);

        return $pdf->download('customer_list_' . time() . '.pdf', array("Attachment" => 0));
    }



    public function getCurrentCustomerDetails(Request $request)
    {
        $data        = [];
        $userDetails = User::find($request->customer_id)->makeHidden(['created_at', 'updated_at', 'status', 'profile_image', 'balance', 'profile_src']);
        if ($userDetails->exists()) {
            $data['status']      = true;
            $data['userDetails'] = $userDetails;
        } else {
            $data['status']      = false;
        }
        return $data;
    }
        /**
     * Add for user wallet info
     *
     * @param string Request as $request
     *
     * @return  user info
     */
    public function wallet($userId)
    {
       $defaultCurrencyId    = Settings::getAll()->where('name', 'default_currency')->first();
       $wallet               = new Wallet();
       $wallet->user_id      = $userId;
       $wallet->currency_id  = (int)$defaultCurrencyId->value;
       $wallet->save();

    }
      public function customerWallet(WalletsDataTable $dataTable, $id)
    {

        $data['wallet']      = 'active';
        $data['user']         = DB::table('users')->where('id',$id)->first();

        return $dataTable->render('admin.farmHouseOwnerDetails.wallets', $data);

    }
    
    
    public function fetchDistrictList(Request $request)
    {
         $state_id = $request->state_id;
         $districts =  District::where(['state_id'=>$state_id,'status'=>'active'])->get();
         $str = '<option value="">select district</option>';
         foreach ($districts as $district) {
                
                $str .= '<option value="' . $district->id . '">' . $district->name . '</option>';
         }
            
        return $str;
          
    }
    
    public function customerProfile(Request $request,$id){
          $data['user'] = DB::table('users')->where('id',$request->id)->first();

        if (! $request->isMethod('post')) {
            $data['customer_profile_tab'] = 'active';
            $data['form_name'] = 'Edit Profile Customer';
            return view('admin.farmHouseOwners.profile', $data);

        } elseif ($request->isMethod('post')) {
               $data['result'] = $user = User::find($id);
                    if (isset($_FILES["photos"]["name"])) {
                        foreach ($_FILES["photos"]["error"] as $key => $error) {
                            $tmp_name     = $_FILES["photos"]["tmp_name"][$key];
                            $name         = str_replace(' ', '_', $_FILES["photos"]["name"][$key]);
                            $ext          = pathinfo($name, PATHINFO_EXTENSION);
                            $name         = 'profile_'.time().'.'.$ext;
                            $path         = 'public/images/profile/'.$id;
                            $oldImagePath =  public_path('images/profile').'/'.$id.'/'.$data['result']->profile_image;
                            if (!file_exists($path)) {
                                mkdir($path, 0777, true);
                            }
            
                            if ($ext == 'png' || $ext == 'jpg' || $ext == 'jpeg' || $ext == 'gif') {
                                if (!empty($user->profile_image) && file_exists($oldImagePath)) {
                                    unlink($oldImagePath);
                                }
                                if (move_uploaded_file($tmp_name, $path."/".$name)) {
                                    $user->profile_image  = $name;
                                    $user->save();
                                    return redirect()->to('admin/customer/profile/' . $id);
                                }
                            }
            
                        }
                    }
                  
        }
           
    }
    
    public function customerVerification(Request $request,$id){
            $data['user'] = User::with(['documents'])->where('id',$request->id)->first();
             if (! $request->isMethod('post')) {
            $data['customer_verification_tab'] = 'active';
            $data['form_name'] = 'Edit Verified Document';
            return view('admin.farmHouseOwners.verification', $data);

        } elseif ($request->isMethod('post')) {
                    $document_titles = $request->input('document_titles');
                    $document_images = $request->file('document_images');
                    $document_status = $request->input('document_status');
                    
                    $i=0;
                    foreach($document_titles as $title)
                    {
                        if (isset($document_images[$i]) && $document_images[$i]->isValid()) {
                            $file = $document_images[$i];
                            $loc = public_path('images/vendor-user/documents') . "/";
                            $imageName = "vendor-" . date('YmdHis') . mt_rand(1111, 99997) . "." . $file->getClientOriginalExtension();
                            $file->move($loc, $imageName);
                        } else {
                            $imageName = null; // Set default value if image not uploaded
                        }
                    
                        $user = new UserDocument();
                        $user->user_id = $id; // Assuming $id is defined somewhere
                        $user->title = $title;
                        $user->image = $imageName;
                        $user->status = $document_status[$i];
                        $user->save();
                        $i++;
                    }
                    
                 return redirect()->to('admin/farm-house-owner/verification/' . $id);

            
        }
    }
    
    
    public function customerDocumentDelete(Request $request){
            $id = $request->id;
            UserDocument::find($id)->delete();
           return "success";
    }
    
    public function customerDocumentUpdateStatus(Request $request){
         $userDocument =  UserDocument::find($request->id);
         if($userDocument->status=="verified")
         {
             $userDocument->status = "unverified";
         }else{
             $userDocument->status = "verified";
         }
         
         $userDocument->save();
    }
}

