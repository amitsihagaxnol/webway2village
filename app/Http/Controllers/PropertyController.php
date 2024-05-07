<?php

namespace App\Http\Controllers;

use Auth, DB, Session, Validator, Common;
use App\Http\Controllers\CalendarController;
use Illuminate\Http\Request;
use App\Models\{
    Favourite,
    Properties,
    PropertyDetails,
    PropertyAddress,
    PropertyPhotos,
    PropertyPrice,
    PropertyType,
    PropertyDescription,
    Currency,
    Settings,
    Bookings,
    SpaceType,
    BedType,
    PropertySteps,
    Country,
    Amenities,
    AmenityType,
    FarmType,
    State,
    FarmHouse,
    FarmHouseActivity,
    FarmHouseFacility,
    FarmHouseLocation,
    FarmHousePestDiseasePractice,
    FarmHouseSoilHealthPractice,
    FarmHouseIrrigationMethodPractice,
    FarmHouseSustainablePractice,
    OrganicProduct,
    FarmPractice,
    District,
    User,
    RoomType
};

class PropertyController extends Controller
{

        public function add(Request $request)
    {

        if ($request->isMethod('post')) {
            $rules = array(
              'property_type_id'  => 'required',
              'space_type'        => 'required',
              'accommodates'      => 'required',
              'map_address'       => 'required',
              'host_id'           => 'required',
            );

            $fieldNames = array(
              'property_type_id'  => 'Home Type',
              'space_type'        => 'Room Type',
              'accommodates'      => 'Accommodates',
              'map_address'       => 'City',
              'host_id'           => 'Host'
            );

            $validator = Validator::make($request->all(), $rules);
            $validator->setAttributeNames($fieldNames);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            } else {
                $property                  = new Properties;
                $property->host_id         = $request->host_id;
                $property->name            = SpaceType::find($request->space_type)->name.' in '.$request->city;
                $property->property_type   = $request->property_type_id;
                $property->space_type      = $request->space_type;
                $property->accommodates    = $request->accommodates;
                $property->slug            = Common::pretty_url($property->name);
                $property->is_verified     = 'Approved';
                $property->save();

                $property_address                 = new PropertyAddress;
                $property_address->property_id    = $property->id;
                $property_address->address_line_1 = $request->route;
                $property_address->city           = $request->city;
                $property_address->state          = $request->state;
                $property_address->country        = $request->country;
                $property_address->postal_code    = $request->postal_code;
                $property_address->latitude       = $request->latitude;
                $property_address->longitude      = $request->longitude;
                $property_address->save();

                $property_price                 = new PropertyPrice;
                $property_price->property_id    = $property->id;
                $property_price->currency_code  = \Session::get('currency');
                $property_price->save();

                $property_steps                   = new PropertySteps;
                $property_steps->property_id      = $property->id;
                $property_steps->save();

                $property_description              = new PropertyDescription;
                $property_description->property_id = $property->id;
                $property_description->save();

                return redirect('listing/'.$property->id.'/basics');
            }
        }


        $data['property_type'] = PropertyType::where('status', 'Active')->pluck('name', 'id');
        $data['space_type']    = SpaceType::where('status', 'Active')->pluck('name', 'id');
        $data['users']         = User::where('status', 'Active')->get();
        return view('property.add', $data);
    }

    public function userProperties(Request $request)
    {
        switch ($request->status) {
            case 'Listed':
            case 'Unlisted':
                $pram = [['status', '=', $request->status]];
                break;
            default:
                $pram = [];
                break;
        }
        $data['property_approval'] = Settings::getAll()->firstWhere('name', 'property_approval')->value;
        // $data['property_approval']="yes";
        $data['status'] = $request->status;

        $data['properties'] = Properties::with('property_price', 'property_address')
                                ->where('host_id',Auth::id())
                                ->where($pram)
                                ->orderBy('id', 'desc')
                                ->paginate(Session::get('row_per_page'));
        $data['currentCurrency'] =  Common::getCurrentCurrency();

        return view('property.listings', $data);
    }

    public function create(Request $request)
    {
        if ($request->isMethod('post')) {
            $rules = array(
                'property_type_id'  => 'required',
                'space_type'        => 'required',
                'accommodates'      => 'required',
                'map_address'       => 'required',
            );

            $fieldNames = array(
                'property_type_id'  => 'Home Type',
                'space_type'        => 'Room Type',
                'accommodates'      => 'Accommodates',
                'map_address'       => 'City',
            );

            $validator = Validator::make($request->all(), $rules);
            $validator->setAttributeNames($fieldNames);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            } else {
                $property                  = new Properties;
                $property->host_id         = Auth::id();
                $property->name            = SpaceType::getAll()->find($request->space_type)->name . ' in ' . $request->city;
                $property->property_type   = $request->property_type_id;
                $property->space_type      = $request->space_type;
                $property->accommodates    = $request->accommodates;
                $property->slug            = Common::pretty_url($property->name);

                $adminPropertyApproval= Settings::getAll()->firstWhere('name', 'property_approval')->value;
                $property->is_verified  = ($adminPropertyApproval == 'Yes') ? 'Pending' : 'Approved';

                $property->save();

                $property_address                 = new PropertyAddress;
                $property_address->property_id    = $property->id;
                $property_address->address_line_1 = $request->route;
                $property_address->city           = $request->city;
                $property_address->state          = $request->state;
                $property_address->country        = $request->country;
                $property_address->postal_code    = $request->postal_code;
                $property_address->latitude       = $request->latitude;
                $property_address->longitude      = $request->longitude;
                $property_address->save();

                $property_price                 = new PropertyPrice;
                $property_price->property_id    = $property->id;
                $property_price->currency_code  = \Session::get('currency');
                $property_price->save();

                $property_steps                   = new PropertySteps;
                $property_steps->property_id      = $property->id;
                $property_steps->save();

                $property_description              = new PropertyDescription;
                $property_description->property_id = $property->id;
                $property_description->save();


                return redirect('listing/' . $property->id . '/basics');
            }
        }


        $data['property_type'] = PropertyType::getAll()->where('status', 'Active')->pluck('name', 'id');
        $data['space_type']    = SpaceType::getAll()->where('status', 'Active')->pluck('name', 'id');

        return view('property.create', $data);
    }

    public function listing(Request $request, CalendarController $calendar)
    {


        $step            = $request->step;
        $property_id     = $request->id;
        $data['step']    = $step;
        $data['result']  = Properties::where('host_id', Auth::id())->findOrFail($property_id);
        $data['details'] = PropertyDetails::pluck('value', 'field');
        $data['missed']  = PropertySteps::where('property_id', $request->id)->first();


        if ($step == 'basics') {

            if ($request->isMethod('post')) {
                $property                     = Properties::find($property_id);
                $property->bedrooms           = $request->bedrooms;
                $property->beds               = $request->beds;
                $property->bathrooms          = $request->bathrooms;
                $property->bed_type           = $request->bed_type;
                $property->property_type      = $request->property_type;
                $property->space_type         = $request->space_type;
                $property->accommodates       = $request->accommodates;
                $property->save();

                $property_steps         = PropertySteps::where('property_id', $property_id)->first();
                $property_steps->basics = 1;
                $property_steps->save();
                return redirect('listing/' . $property_id . '/description');
            }

            $data['bed_type']       = BedType::getAll()->pluck('name', 'id');
            $data['property_type']  = PropertyType::getAll()->where('status', 'Active')->pluck('name', 'id');
            $data['space_type']     = SpaceType::getAll()->pluck('name', 'id');

            if (n_as_k_c()) {
                Session::flush();
                return view('vendor.installer.errors.user');
            }
        } elseif ($step == 'description') {
            if ($request->isMethod('post')) {

                $rules = array(
                    'name'     => 'required|max:50',
                    'summary'  => 'required|max:1000'
                );

                $fieldNames = array(
                    'name'     => 'Name',
                    'summary'  => 'Summary',
                );

                $validator = Validator::make($request->all(), $rules);
                $validator->setAttributeNames($fieldNames);

                if ($validator->fails())
                {
                    return back()->withErrors($validator)->withInput();
                }
                else
                {
                    $property           = Properties::find($property_id);
                    $property->name     = $request->name;
                    $property->slug     = Common::pretty_url($request->name);
                    $property->save();

                    $property_description              = PropertyDescription::where('property_id', $property_id)->first();
                    $property_description->summary     = $request->summary;
                    $property_description->save();

                    $property_steps              = PropertySteps::where('property_id', $property_id)->first();
                    $property_steps->description = 1;
                    $property_steps->save();
                    return redirect('listing/' . $property_id . '/location');
                }
            }
            $data['description']       = PropertyDescription::where('property_id', $property_id)->first();
        } elseif ($step == 'details') {
            if ($request->isMethod('post')) {
                $property_description                       = PropertyDescription::where('property_id', $property_id)->first();
                $property_description->about_place          = $request->about_place;
                $property_description->place_is_great_for   = $request->place_is_great_for;
                $property_description->guest_can_access     = $request->guest_can_access;
                $property_description->interaction_guests   = $request->interaction_guests;
                $property_description->other                = $request->other;
                $property_description->about_neighborhood   = $request->about_neighborhood;
                $property_description->get_around           = $request->get_around;
                $property_description->save();

                return redirect('listing/' . $property_id . '/description');
            }
        } elseif ($step == 'location') {
            if ($request->isMethod('post')) {
                $rules = array(
                    'address_line_1'    => 'required|max:250',
                    'address_line_2'    => 'max:250',
                    'country'           => 'required',
                    'city'              => 'required',
                    'state'             => 'required',
                    'latitude'          => 'required|not_in:0',
                );

                $fieldNames = array(
                    'address_line_1' => 'Address Line 1',
                    'country'        => 'Country',
                    'city'           => 'City',
                    'state'          => 'State',
                    'latitude'       => 'Map',
                );

                $messages = [
                    'not_in' => 'Please set :attribute pointer',
                ];

                $validator = Validator::make($request->all(), $rules, $messages);
                $validator->setAttributeNames($fieldNames);

                if ($validator->fails()) {
                    return back()->withErrors($validator)->withInput();
                } else {
                    $property_address                 = PropertyAddress::where('property_id', $property_id)->first();
                    $property_address->address_line_1 = $request->address_line_1;
                    $property_address->address_line_2 = $request->address_line_2;
                    $property_address->latitude       = $request->latitude;
                    $property_address->longitude      = $request->longitude;
                    $property_address->city           = $request->city;
                    $property_address->state          = $request->state;
                    $property_address->country        = $request->country;
                    $property_address->postal_code    = $request->postal_code;
                    $property_address->save();

                    $property_steps           = PropertySteps::where('property_id', $property_id)->first();
                    $property_steps->location = 1;
                    $property_steps->save();

                    return redirect('listing/' . $property_id . '/amenities');
                }
            }
            $data['country']       = Country::pluck('name', 'short_name');
        } elseif ($step == 'amenities') {
            if ($request->isMethod('post') && is_array($request->amenities)) {
                $rooms            = Properties::find($request->id);
                $rooms->amenities = implode(',', $request->amenities);
                $rooms->save();
                return redirect('listing/' . $property_id . '/photos');
            }
            $data['property_amenities'] = explode(',', $data['result']->amenities);
            $data['amenities']          = Amenities::where('status', 'Active')->get();
            $data['amenities_type']     = AmenityType::get();
        } elseif ($step == 'photos') {
            if ($request->isMethod('post')) {

               if(isset($request->photos))
               {
                if ($request->crop == 'crop' && $request->photos) {
                    $baseText = explode(";base64,", $request->photos);
                    $name = explode(".", $request->img_name);
                    $convertedImage = base64_decode($baseText[1]);
                    $request->request->add(['type'=>end($name)]);
                    $request->request->add(['image'=>$convertedImage]);


                    $validate = Validator::make($request->all(), [
                        'type' => 'required|in:png,jpg,JPG,JPEG,jpeg,bmp',
                        'img_name' => 'required',
                        'photos' => 'required',
                    ]);
                } else {
                    $validate = Validator::make($request->all(), [
                        'file' => 'required|file|mimes:jpg,jpeg,bmp,png,gif,JPG',
                        'file' => 'dimensions:min_width=640,min_height=360'
                    ]);
                }

                if ($validate->fails()) {
                    return back()->withErrors($validate)->withInput();
                }

                $path = public_path('images/property/' . $property_id . '/');

                if (!file_exists($path)) {
                    mkdir($path, 0777, true);
                }

                if ($request->crop == "crop") {
                    $image = $name[0].uniqid() . '.' . end($name);
                    $uploaded = file_put_contents($path . $image, $convertedImage);
                } else {
                    if (isset($_FILES["file"]["name"])) {
                        $tmp_name = $_FILES["file"]["tmp_name"];
                        $name = str_replace(' ', '_', $_FILES["file"]["name"]);
                        $ext = pathinfo($name, PATHINFO_EXTENSION);
                        $image = time() . '_' . $name;
                        $path = 'public/images/property/' . $property_id;
                        if ($ext == 'png' || $ext == 'jpg' || $ext == 'jpeg' || $ext == 'gif' || $ext == 'JPG') {
                            $uploaded = move_uploaded_file($tmp_name, $path . "/" . $image);
                        }
                    }
                }

                if ($uploaded) {
                    $photos = new PropertyPhotos;
                    $photos->property_id = $property_id;
                    $photos->photo = $image;
                    $photos->serial = 1;
                    $photos->cover_photo = 1;

                    $exist = PropertyPhotos::orderBy('serial', 'desc')
                        ->select('serial')
                        ->where('property_id', $property_id)
                        ->take(1)->first();

                    if (!empty($exist->serial)) {
                        $photos->serial = $exist->serial + 1;
                        $photos->cover_photo = 0;
                    }
                    $photos->save();
                    $property_steps = PropertySteps::where('property_id', $property_id)->first();
                    $property_steps->photos = 1;
                    $property_steps->save();
                }


                return redirect('listing/' . $property_id . '/photos')->with('success', 'File Uploaded Successfully!');


            }else{


                       $propertydata = Properties::find($request->id);

                        if($request->hasfile('feature_img'))
                        {

                            $file = $request->file('feature_img');
                            $extenstion = $file->getClientOriginalExtension();
                            $filename ='feature-image'.time().'-'.date('Ymd').'.'.$extenstion;
                            $file->move('public/images/property/feature-image/', $filename);
                            $image = $filename;
                            $propertydata->feature_image = $image;
                        }
                        $propertydata->video_link = $request->input('video_link');
                        $propertydata->save();

                return redirect('listing/' . $property_id . '/photos')->with('success', 'File Uploaded Successfully!');

              }

            }


            $data['photos'] = PropertyPhotos::where('property_id', $property_id)
                ->orderBy('serial', 'asc')
                ->get();

        } elseif ($step == 'pricing') {
            if ($request->isMethod('post')) {
                $bookings = Bookings::where('property_id', $property_id)->where('currency_code', '!=', $request->currency_code)->first();
                if ($bookings) {
                    return back()->withErrors(['currency' => __('Booking has been made using the current currency. It cannot be changed now')]);
                }
                $rules = array(
                    'price' => 'required|numeric|min:5',
                    'weekly_discount' => 'nullable|numeric|max:99|min:0',
                    'monthly_discount' => 'nullable|numeric|max:99|min:0'
                );

                $fieldNames = array(
                    'price'  => 'Price',
                    'weekly_discount' => 'Weekly Discount Percent',
                    'monthly_discount' => 'Monthly Discount Percent'
                );

                $validator = Validator::make($request->all(), $rules);
                $validator->setAttributeNames($fieldNames);

                if ($validator->fails()) {
                    return back()->withErrors($validator)->withInput();
                } else {
                    $property_price                    = PropertyPrice::where('property_id', $property_id)->first();
                    $property_price->price             = $request->price;
                    $property_price->weekly_discount   = $request->weekly_discount;
                    $property_price->monthly_discount  = $request->monthly_discount;
                    $property_price->currency_code     = $request->currency_code;
                    $property_price->cleaning_fee      = $request->cleaning_fee;
                    $property_price->guest_fee         = $request->guest_fee;
                    $property_price->guest_after       = $request->guest_after;
                    $property_price->security_fee      = $request->security_fee;
                    $property_price->weekend_price     = $request->weekend_price;
                    $property_price->save();

                    $property_steps = PropertySteps::where('property_id', $property_id)->first();
                    $property_steps->pricing = 1;
                    $property_steps->save();

                    return redirect('listing/' . $property_id . '/booking');
                }
            }
        } elseif ($step == 'booking') {
            if ($request->isMethod('post')) {


                $property_steps          = PropertySteps::where('property_id', $property_id)->first();
                $property_steps->booking = 1;
                $property_steps->save();

                $properties               = Properties::find($property_id);
                $properties->booking_type = $request->booking_type;
                $properties->status       = ( $properties->steps_completed == 0 ) ?  'Listed' : 'Unlisted';
                $properties->save();


                return redirect('listing/' . $property_id . '/calendar');
            }
        } elseif ($step == 'calendar') {
            $data['calendar'] = $calendar->generate($request->id);
        }

          elseif ($step == 'products') {

             if ($request->isMethod('post')) {

                $checkFarmhouse =  FarmHouse::where('property_id',$property_id)->first();
                if(isset($checkFarmhouse))
                {
                     $farm_house_data['property_id'] = $property_id;
                     $farm_house_data['user_id'] = $request->input('user_id');
                     $farm_house_data['property_type_id'] = $request->input('property_type_id');
                     $farm_house_data['farm_type_id'] = $request->input('farm_type_id');
                     $farm_house_data['farm_title'] = $request->input('farm_title');
                     $farm_house_data['state_id']  =$request->input('state');
                     $farm_house_data['district_id']  =$request->input('district');
                     $farm_house_data['location']  =$request->input('location');
                     $farm_house_data['postal_code']  =$request->input('postal_code');
                     $farm_house_data['full_address']  =$request->input('full_address');
                     $farm_house_data['contact_number']  =$request->input('contact_number');
                     $farm_house_data['landline_number']  =$request->input('landline_number');
                     $farm_house_data['start_year']  =$request->input('start_year');
                     $farm_house_data['farm_detail']  =$request->input('farm_detail');
                     $farm_house_data['farm_size']  =$request->input('farm_size');
                     $farm_house_data['certification_detail']  =$request->input('certification_detail');
                     $farm_house_data['accomodation_type']  =$request->input('accomodation_type');
                     $farm_house_data['total_bedroom']  =$request->input('total_bedroom');
                     $farm_house_data['total_bathroom']  =$request->input('total_bathroom');
                     $farm_house_data['dimension']  =$request->input('dimension');
                     $farm_house_data['checkin_time']  =$request->input('checkin_time');
                     $farm_house_data['checkout_time']  =$request->input('checkout_time');
                    //  $farm_house_data['airport']  =$request->input('airport');
                    //  $farm_house_data['car_parking']  =$request->input('car_parking');
                    //  $farm_house_data['wifi_internet']  =$request->input('wifi_internet');
                     $farmHouse = FarmHouse::where('property_id',$property_id)->update($farm_house_data);
                }else{

                     $farm_house_data['property_id'] = $property_id;
                     $farm_house_data['user_id'] = $request->input('user_id');
                     $farm_house_data['property_type_id'] = $request->input('property_type_id');
                     $farm_house_data['farm_type_id'] = $request->input('farm_type_id');
                     $farm_house_data['farm_title'] = $request->input('farm_title');
                     $farm_house_data['state_id']  =$request->input('state');
                     $farm_house_data['district_id']  =$request->input('district');
                     $farm_house_data['location']  =$request->input('location');
                     $farm_house_data['postal_code']  =$request->input('postal_code');
                     $farm_house_data['full_address']  =$request->input('full_address');
                     $farm_house_data['contact_number']  =$request->input('contact_number');
                     $farm_house_data['landline_number']  =$request->input('landline_number');
                     $farm_house_data['start_year']  =$request->input('start_year');
                     $farm_house_data['farm_detail']  =$request->input('farm_detail');
                     $farm_house_data['farm_size']  =$request->input('farm_size');
                     $farm_house_data['certification_detail']  =$request->input('certification_detail');
                     $farm_house_data['accomodation_type']  =$request->input('accomodation_type');
                     $farm_house_data['total_bedroom']  =$request->input('total_bedroom');
                     $farm_house_data['total_bathroom']  =$request->input('total_bathroom');
                     $farm_house_data['dimension']  =$request->input('dimension');
                     $farm_house_data['checkin_time']  =$request->input('checkin_time');
                     $farm_house_data['checkout_time']  =$request->input('checkout_time');
                    //  $farm_house_data['airport']  =$request->input('airport');
                    //  $farm_house_data['car_parking']  =$request->input('car_parking');
                    //  $farm_house_data['wifi_internet']  =$request->input('wifi_internet');
                    $farmHouse = FarmHouse::create($farm_house_data);

                }



                return redirect('listing/'.$property_id.'/type_of_organic_products');
             }

             $data['farm_house']  = FarmHouse::where('property_id',$property_id)->first();
             if(isset($data['farm_house']))
             {
                  $data['districts'] = District::where('state_id',$data['farm_house']->state_id)->get();
             }
              $data['property_type']  = PropertyType::where('status', 'Active')->pluck('name', 'id');
              $data['farm_type']  = FarmType::where('status', 'Active')->get();
              $data['state']  = State::where('country_id',1)->get();
              $data['users'] = User::where(['id'=>Auth::id()])->get();

        }
        elseif ($step == 'type_of_organic_products') {

             if ($request->isMethod('post')) {

                    $checkOrganicProduct =  OrganicProduct::where('property_id',$property_id)->get();
                    if(isset($checkOrganicProduct))
                    {
                          OrganicProduct::where('property_id',$property_id)->delete();

                    }
                    $product_titles = $request->input('product_title');
                    $product_unit_prices = $request->input('product_unit');
                    $seasonal_availabilities = $request->input('seasonal_availability');
                    $descriptions = $request->input('description');
                    $usproduct_availabilities = $request->input('usproduct_availability');
                    $i = 0;
                    foreach($product_titles as $title) {
                        $product_data['property_id'] = $property_id;
                        $product_data['product_title'] = $title;
                        $product_data['price'] = $product_unit_prices[$i];
                        $product_data['seasonal_availability'] = $seasonal_availabilities[$i];
                        // $product_data['seasonal_availability'] = $seasonal_availabilities[$i]; // Seems like a duplication here
                        $product_data['description'] = $descriptions[$i];
                        $product_data['product_availability'] = $usproduct_availabilities[$i];
                        OrganicProduct::create($product_data); // Assuming OrganicProduct is the model representing your table
                        $i++;
                    }


                return redirect('listing/'.$property_id.'/sustainable_farm_practices');
             }

             $data['organic_products'] = OrganicProduct::where('property_id',$property_id)->get();


        }
         elseif ($step == 'sustainable_farm_practices') {

             if ($request->isMethod('post')) {

                    $checkSustainableFarmings =  FarmHouseSustainablePractice::where('property_id',$property_id)->get();
                    if(isset($checkSustainableFarmings))
                    {
                          FarmHouseSustainablePractice::where('property_id',$property_id)->delete();

                    }

                   $sustainable_farmings = $request->input('sustainable_farming');

                      foreach($sustainable_farmings as $sustainable) {
                        $sustainable_data['property_id'] = $property_id;
                        $sustainable_data['sustainable_practice_id'] = $sustainable;
                        FarmHouseSustainablePractice::create($sustainable_data);
                    }
                  return redirect('listing/'.$property_id.'/irrigation_method_farm_practices');
             }
             $data['sustainableFarmings']  = FarmPractice::where('key' ,'sustainable_farming')->get();

              $data['sustainable_practices'] = FarmHouseSustainablePractice::with(['sustainable_practice'])->where('property_id',$property_id)->get();

        }



         elseif ($step == 'irrigation_method_farm_practices') {


             if ($request->isMethod('post')) {
                    $checkIrrigationMethodPractice =  FarmHouseIrrigationMethodPractice::where('property_id',$property_id)->get();
                    if(isset($checkIrrigationMethodPractice))
                    {
                          FarmHouseIrrigationMethodPractice::where('property_id',$property_id)->delete();

                    }
                     $irrigation_method_farmings = $request->input('irrigation_method');
                      foreach($irrigation_method_farmings as $irrigation_method) {
                        $irrigation_method_data['property_id'] = $property_id;
                        $irrigation_method_data['irrigation_method_id'] = $irrigation_method;
                        FarmHouseIrrigationMethodPractice::create($irrigation_method_data);
                    }
                  return redirect('listing/'.$property_id.'/soil_health_and_fertility_practices');
             }
             $data['irrigationMethds'] = FarmPractice::where('key' ,'irrigation_method')->get();
             $data['irrigation_methds'] = FarmHouseIrrigationMethodPractice::with(['irrigation_method'])->where('property_id',$property_id)->get();



        }
          elseif ($step == 'soil_health_and_fertility_practices') {

             if ($request->isMethod('post')) {

                    $checkSoilHealthFarmings =  FarmHouseSoilHealthPractice::where('property_id',$property_id)->get();
                    if(isset($checkSoilHealthFarmings))
                    {
                          FarmHouseSoilHealthPractice::where('property_id',$property_id)->delete();

                    }
                    $soil_health_farmings = $request->input('soil_health');

                      foreach($soil_health_farmings as $soil_health) {
                        $soil_health_data['property_id'] = $property_id;
                        $soil_health_data['soil_health_id'] = $soil_health;
                        FarmHouseSoilHealthPractice::create($soil_health_data);
                    }
                   return redirect('listing/'.$property_id.'/pest_and_disease_farm_practices');
             }
                $data['soilHealths'] = FarmPractice::where('key' ,'soil_health')->get();
                $data['soil_health_practices'] = FarmHouseSoilHealthPractice::with(['soil_health_practice'])->where('property_id',$property_id)->get();



        }

           elseif ($step == 'pest_and_disease_farm_practices') {

             if ($request->isMethod('post')) {
                      $checkPestDiseaseFarmings =  FarmHousePestDiseasePractice::where('property_id',$property_id)->get();
                    if(isset($checkPestDiseaseFarmings))
                    {
                          FarmHousePestDiseasePractice::where('property_id',$property_id)->delete();

                    }
                      $pest_disease_farmings = $request->input('pest_disease');

                    foreach($pest_disease_farmings as $pest_disease) {
                        $pest_disease_data['property_id'] = $property_id;
                        $pest_disease_data['pest_disease_id'] = $pest_disease;
                        FarmHousePestDiseasePractice::create($pest_disease_data);
                    }
                    return redirect('listing/'.$property_id.'/location_near_me');
             }

              $data['pestDiseases'] = FarmPractice::where('key' ,'pest_disease')->get();
              $data['pest_disease_practices'] = FarmHousePestDiseasePractice::with(['pest_disease_practice'])->where('property_id',$property_id)->get();


        }

       elseif ($step == 'location_near_me') {

             if ($request->isMethod('post')) {
                      $checkLocation =  FarmHouseLocation::where('property_id',$property_id)->get();
                    if(isset($checkLocation))
                    {
                          FarmHouseLocation::where('property_id',$property_id)->delete();

                    }
                    $location_titles = $request->input('title');
                    $distance= $request->input('distance');
                    $p=0;
                    foreach($location_titles as $title) {
                        $location_title_data['property_id'] = $property_id;
                        $location_title_data['location_title'] = $title;
                        $location_title_data['distance'] = $distance[$p];
                        FarmHouseLocation::create($location_title_data);
                      $p++;
                    }
                   return redirect('listing/'.$property_id.'/facilities');
             }
              $data['locations'] = FarmHouseLocation::where('property_id',$property_id)->get();

        }
         elseif ($step == 'facilities') {

             if ($request->isMethod('post')) {

                   $checkfacility =  FarmHouseFacility::where('property_id',$property_id)->get();
                    if(isset($checkfacility))
                    {
                          FarmHouseFacility::where('property_id',$property_id)->delete();

                    }
                  $facilities = $request->input('facilities');

                  foreach($facilities as $facilitie) {
                        $facilitie_data['property_id'] = $property_id;
                        $facilitie_data['name'] = $facilitie;
                        FarmHouseFacility::create($facilitie_data);
                    }
                 return redirect('listing/'.$property_id.'/activities');
             }

              $data['facilities'] = FarmHouseFacility::where('property_id',$property_id)->get();

        }

          elseif ($step == 'activities') {



             if ($request->isMethod('post')) {

                  $checkActivity =  FarmHouseActivity::where('property_id',$property_id)->get();
                    if(isset($checkActivity))
                    {
                          FarmHouseActivity::where('property_id',$property_id)->delete();

                    }

                  $activity_titles = $request->input('activity_title');
                    $activity_price = $request->input('activity_price');
                    $j=0;
                    foreach($activity_titles as $activity) {

                        $activity_title_data['property_id'] = $property_id;
                        $activity_title_data['name'] = $activity;
                        $activity_title_data['price'] = $activity_price[$j];
                        FarmHouseActivity::create($activity_title_data);
                      $j++;
                    }

                     return redirect('listing/'.$property_id.'/general_informations');
             }
            $data['activities'] = FarmHouseActivity::where('property_id',$property_id)->get();

        }

        elseif ($step == 'general_informations') {


             if ($request->isMethod('post')) {

                       $farm_house_data['accomodation_type']  =$request->input('accomodation_type');
                       $farm_house_data['total_bedroom']  =$request->input('total_bedroom');
                       $farm_house_data['total_bathroom']  =$request->input('total_bathroom');
                       $farm_house_data['dimension']  =$request->input('dimension');
                       $farm_house_data['checkin_time']  =$request->input('checkin_time');
                       $farm_house_data['checkout_time']  =$request->input('checkout_time');
                       $farm_house_data['airport']  =$request->input('airport');
                       $farm_house_data['car_parking']  =$request->input('car_parking');
                       $farm_house_data['wifi_internet']  =$request->input('wifi_internet');
                       $farmHouse = FarmHouse::where('property_id',$property_id)->update($farm_house_data);
                       return redirect('listing/'.$property_id.'/general_informations');

             }

             $data['farmHouse'] = FarmHouse::where('property_id',$property_id)->first();


        }

        return view("listing.$step", $data);
    }


    public function updateStatus(Request $request)
    {
        $property_id = $request->id;
        $reqstatus = $request->status;
        if ($reqstatus == 'Listed') {
            $status = 'Unlisted';
        } else {
            $status = 'Listed';
        }
        $properties         = Properties::where('host_id', Auth::id())->find($property_id);
        $properties->status = $status;
        $properties->save();
        $properties->prop_status = __($status);
        return  response()->json($properties);

    }

    public function getPrice(Request $request)
    {

        return Common::getPrice($request->property_id, $request->checkin, $request->checkout, $request->guest_count);
    }

    public function single(Request $request)
    {

        $data['property_slug'] = $request->slug;

        $data['result'] = $result = Properties::where('slug', $request->slug)->first();

        $userActive = $result->Users()->where('id', $result->host_id)->first();

        if ($userActive->status == 'Inactive' ) {
            return view('property.host_inactive');

        } elseif ($data['result']->status == 'Unlisted' ) {
            return view('property.unlisted_property');

        } else {

            if ( empty($result) ) {
                abort('404');
            }

            $data['property_id']      = $id = $result->id;
            $data['booking_status']   = Bookings::where('property_id',$id)->select('status')->first();

            $data['property_photos']  = PropertyPhotos::where('property_id', $id)->orderBy('serial', 'asc')
                ->get();

            $data['amenities']        = Amenities::normal($id);
            $data['safety_amenities'] = Amenities::security($id);

            $newAmenityTypes          = Amenities::newAmenitiesType();
            $data['all_new_amenities']= [];

            foreach ($newAmenityTypes as $amenites) {
                $data['all_new_amenities'][$amenites->name] = Amenities::newAmenities($id, $amenites->id);
            }

            $data['all_new_amenities']= array_filter($data['all_new_amenities']);

            $property_address         = $data['result']->property_address;

            $latitude                 = $property_address->latitude;

            $longitude                = $property_address->longitude;

            $data['checkin']          = (isset($request->checkin) && $request->checkin != '') ? $request->checkin:'';
            $data['checkout']         = (isset($request->checkout) && $request->checkout != '') ? $request->checkout:'';

            $data['guests']           = (isset($request->guests) && $request->guests != '')?$request->guests:'';

            $data['similar']  = Properties::join('property_address', function ($join) {
                                            $join->on('properties.id', '=', 'property_address.property_id');
            })
                                        ->select(DB::raw('*, ( 3959 * acos( cos( radians(' . $latitude . ') ) * cos( radians( latitude ) ) * cos( radians( longitude ) - radians(' . $longitude . ') ) + sin( radians(' . $latitude . ') ) * sin( radians( latitude ) ) ) ) as distance'))
                                        ->having('distance', '<=', 30)
                                        ->where('properties.host_id', '!=', Auth::id())
                                        ->where('properties.id', '!=', $id)
                                        ->where('properties.status', 'Listed')
                                        ->get();

            $data['title']    =   $data['result']->name . ' in ' . $data['result']->property_address->city;
            $data['symbol'] = Common::getCurrentCurrencySymbol();
            $data['shareLink'] = url('properties/' . $data['property_slug']);

            $data['date_format'] = Settings::getAll()->firstWhere('name', 'date_format_type')->value;

            $data['adminPropertyApproval'] = Settings::getAll()->firstWhere('name', 'property_approval')->value;

            return view('property.single', $data);

        }
    }

    public function currencySymbol(Request $request)
    {
        $symbol          = Currency::code_to_symbol($request->currency);
        $data['success'] = 1;
        $data['symbol']  = $symbol;

        return json_encode($data);
    }

    public function photoMessage(Request $request)
    {
        $property = Properties::find($request->id);
        if ($property->host_id == \Auth::user()->id) {
            $photos = PropertyPhotos::find($request->photo_id);
            $photos->message = $request->messages;
            $photos->save();
        }

        return json_encode(['success'=>'true']);
    }

    public function photoDelete(Request $request)
    {
        $property   = Properties::find($request->id);
        if ($property->host_id == \Auth::user()->id) {
            $photos = PropertyPhotos::find($request->photo_id);
            $photos->delete();
        }

        return json_encode(['success'=>'true']);
    }

    public function makeDefaultPhoto(Request $request)
    {

        if ($request->option_value == 'Yes') {
            PropertyPhotos::where('property_id', '=', $request->property_id)
            ->update(['cover_photo' => 0]);

            $photos = PropertyPhotos::find($request->photo_id);
            $photos->cover_photo = 1;
            $photos->save();
        }
        return json_encode(['success'=>'true']);
    }

    public function makePhotoSerial(Request $request)
    {

        $photos         = PropertyPhotos::find($request->id);
        $photos->serial = $request->serial;
        $photos->save();

        return json_encode(['success'=>'true']);
    }


    public function set_slug()
    {

       $properties   = Properties::where('slug', NULL)->get();
       foreach ($properties as $key => $property) {

           $property->slug     = Common::pretty_url($property->name);
           $property->save();
       }
       return redirect('/');

    }

    public function userBookmark()
    {

        $data['bookings'] = Favourite::with(['properties' => function ($q) {
            $q->with('property_address');
        }])->where(['user_id' => Auth::id(), 'status' => 'Active'])->orderBy('id', 'desc')
            ->paginate(Settings::getAll()->where('name', 'row_per_page')->first()->value);
        return view('users.favourite', $data);
    }

    public function addEditBookMark()
    {
        $property_id = request('id');
        $user_id = request('user_id');

        $favourite = Favourite::where('property_id', $property_id)->where('user_id', $user_id)->first();

        if (empty($favourite)) {
            $favourite = Favourite::create([
                'property_id' => $property_id,
                'user_id' => $user_id,
                'status' => 'Active',
            ]);

        } else {
            $favourite->status = ($favourite->status == 'Active') ? 'Inactive' : 'Active';
            $favourite->save();
        }

        return response()->json([
            'favourite' => $favourite
        ]);
    }

}
