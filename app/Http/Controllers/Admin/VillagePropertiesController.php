<?php

/**
 * VillagePropertiesController Controller
 *
 * VillagePropertiesController Controller manages VillagePropertiesController by admin.
 *
 * @category   VillagePropertiesController
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

use PDF, Validator, Excel, Common;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\VillagePropertyDataTable;
use App\Exports\PropertiesExport;
use App\Http\Controllers\Admin\CalendarController;
use App\Models\{
    VillageProperties,
    VillagePropertyDetails,
    VillagePropertyAddress,
    VillagePropertyPhotos,
    VillagePropertyPrice,
    PropertyType,
    VillagePropertyDescription,
    SpaceType,
    BedType,
    VillagePropertySteps,
    Country,
    Amenities,
    AmenityType,
    User,
    Settings,
    VillageBookings,
    FarmType,
    State,
    VillageFarmHouse,
    FarmHouseActivity,
    VillageFarmHouseFacility,
    VillageFarmHouseLocation,
    VillageFarmHousePestDiseasePractice,
    VillageFarmHouseSoilHealthPractice,
    VillageFarmHouseIrrigationMethodPractice,
    VillageFarmHouseSustainablePractice,
    VillageOrganicProduct,
    FarmPractice,
    District,
    RoomType,
    VillagePropertyRoomType,
};
use Auth;

class VillagePropertiesController extends Controller
{

    public function index(VillagePropertyDataTable $dataTable)
    {

        $data['from'] = isset(request()->from) ? request()->from : null;
        $data['to']   = isset(request()->to) ? request()->to : null;
        $data['space_type_all'] = SpaceType::getAll();
        $data['states'] = State::where('status','active')->get();
        $data['districts'] = District::where('status','active')->get();

        if (isset(request()->reset_btn)) {
            $data['from']        = null;
            $data['to']          = null;
            $data['allstatus']   = '';
            $data['allSpaceType']   = '';
            $data['state_data']   = '';
            $data['district_data']   = '';
            return $dataTable->render('admin.village_properties.view', $data);
        }
        isset(request()->status) ? $data['allstatus'] = $allstatus = request()->status : $data['allstatus'] = $allstatus = '';
        isset(request()->space_type) ? $data['allSpaceType'] = request()->space_type : $data['allSpaceType']  = '';
        isset(request()->state) ? $data['state_data'] = request()->state : $data['state_data']  = '';
        isset(request()->district) ? $data['district_data'] = request()->district : $data['district_data']  = '';
        return $dataTable->render('admin.village_properties.view', $data);
    }

    public function add(Request $request)
    {
        if ($request->isMethod('post')) {
            // dd('ge');
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

                $property                  = new VillageProperties;
                $property->host_id         = $request->host_id;
                $property->name            = SpaceType::find($request->space_type)->name.' in '.$request->city;
                $property->property_type   = $request->property_type_id;
                $property->space_type      = $request->space_type;
                $property->accommodates    = $request->accommodates;
                $property->slug            = Common::pretty_url($property->name);
                $property->is_verified     = 'Approved';
                $property->save();

                $property_address                 = new VillagePropertyAddress;
                $property_address->property_id    = $property->id;
                $property_address->address_line_1 = $request->route;
                $property_address->city           = $request->city;
                $property_address->state          = $request->state;
                $property_address->country        = $request->country;
                $property_address->postal_code    = $request->postal_code;
                $property_address->latitude       = $request->latitude;
                $property_address->longitude      = $request->longitude;
                $property_address->save();

                $property_price                 = new VillagePropertyPrice;
                $property_price->property_id    = $property->id;
                $property_price->currency_code  = \Session::get('currency');
                $property_price->save();

                $property_steps                   = new VillagePropertySteps;
                $property_steps->property_id      = $property->id;
                $property_steps->save();

                $property_description              = new VillagePropertyDescription;
                $property_description->property_id = $property->id;
                $property_description->save();


                return redirect('admin/village-listing/'.$property->id.'/basics');
            }
        }

        $data['property_type'] = PropertyType::where('status', 'Active')->pluck('name', 'id');
        $data['space_type']    = SpaceType::where('status', 'Active')->pluck('name', 'id');
        $data['users']         = User::where('status', 'Active')->get();

        return view('admin.village_properties.add', $data);
    }

    public function listing(Request $request, CalendarController $calendar)
    {

        $step            = $request->step;
        $property_id     = $request->id;

        $data['step']    = $step;
        $data['result']  = VillageProperties::findOrFail($property_id);
        $data['details'] = VillagePropertyDetails::pluck('value', 'field');

        if ($step == 'basics') {
            if ($request->isMethod('post')) {
                $property                     = VillageProperties::find($property_id);
                $property->bedrooms           = $request->bedrooms;
                $property->beds               = $request->beds;
                $property->bathrooms          = $request->bathrooms;
                $property->bed_type           = $request->bed_type;
                $property->property_type      = $request->property_type;
                // $property->space_type         = $request->space_type;
                $property->accommodates       = $request->accommodates;
                $property->recomended         = $request->recomended;
                $property->is_verified        = $request->verified;
                $property->stay_available     = $request->stay_available;
                $property->save();


                VillagePropertyRoomType::where('property_id', $property_id)->delete();

                if (isset($request->room_type)) {
                    // dd($request->all());
                    foreach ($request->room_type as $key => $roomType) {
                        if (isset($request->room_type[$key])) {
                            $roomType = $request->room_type[$key] ?? null;
                            $total = $request->total[$key] ?? 0;
                            $available = $request->available[$key] ?? 0;
                            $status = $request->status[$key] ?? null;
                            $price_per_night = $request->price_per_night[$key] ?? 0;
                            $for_adults = $request->for_adults[$key] ?? 0;
                            $for_childrens = $request->for_childrens[$key] ?? 0;

                            $propertyRoomType = new VillagePropertyRoomType();
                            $propertyRoomType->property_id = $property->id;
                            $propertyRoomType->room_type = $roomType;
                            $propertyRoomType->total = $total;
                            $propertyRoomType->available = $available;
                            $propertyRoomType->status = $status;
                            $propertyRoomType->price_per_night = $price_per_night;
                            $propertyRoomType->for_adults = $for_adults;
                            $propertyRoomType->for_childrens = $for_childrens;
                            $propertyRoomType->save();
                        }
                    }
                }


                $property_steps = VillagePropertySteps::where('property_id', $property_id)->first();
                $property_steps->basics = 1;
                $property_steps->save();

                return redirect('admin/village-listing/'.$property_id.'/description');
            }

            $data['room_type']      = RoomType::where('status', 'Active')->pluck('name', 'id');
            $data['room_type_table_data']  = VillagePropertyRoomType::where('property_id', $property_id)->get();
            $data['bed_type']       = BedType::pluck('name', 'id');
            $data['property_type']  = PropertyType::where('status', 'Active')->pluck('name', 'id');
            $data['space_type']     = SpaceType::pluck('name', 'id');
        }
        elseif ($step == 'description') {

            if ($request->isMethod('post')) {
                $rules = array(
                    'name'     => 'required|max:50',
                    'summary'  => 'required|max:1000',
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
                    $property           = VillageProperties::find($property_id);
                    $property->name     = $request->name;
                    $property->slug     = Common::pretty_url($request->name);
                    $property->save();

                    $property_description              = VillagePropertyDescription::where('property_id', $property_id)->first();
                    $property_description->summary     = $request->summary;
                    $property_description->save();

                    $property_steps = VillagePropertySteps::where('property_id', $property_id)->first();
                    $property_steps->description = 1;
                    $property_steps->save();
                    return redirect('admin/village-listing/'.$property_id.'/location');
                }
            }
            $data['description']       = VillagePropertyDescription::where('property_id', $property_id)->first();
        }
        elseif ($step == 'details') {
            if ($request->isMethod('post')) {
                $property_description                       = VillagePropertyDescription::where('property_id', $property_id)->first();
                $property_description->about_place          = $request->about_place;
                $property_description->place_is_great_for   = $request->place_is_great_for;
                $property_description->guest_can_access     = $request->guest_can_access;
                $property_description->interaction_guests   = $request->interaction_guests;
                $property_description->other                = $request->other;
                $property_description->about_neighborhood   = $request->about_neighborhood;
                $property_description->get_around           = $request->get_around;
                $property_description->save();

                return redirect('admin/village-listing/'.$property_id.'/description');
            }
        }
        elseif ($step == 'location') {
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
                    $property_address                 = VillagePropertyAddress::where('property_id', $property_id)->first();
                    $property_address->address_line_1 = $request->address_line_1;
                    $property_address->address_line_2 = $request->address_line_2;
                    $property_address->latitude       = $request->latitude;
                    $property_address->longitude      = $request->longitude;
                    $property_address->city           = $request->city;
                    $property_address->state          = $request->state;
                    $property_address->country        = $request->country;
                    $property_address->postal_code    = $request->postal_code;
                    $property_address->save();

                    $property_steps = VillagePropertySteps::where('property_id', $property_id)->first();
                    $property_steps->location = 1;
                    $property_steps->save();

                    return redirect('admin/village-listing/'.$property_id.'/amenities');
                }
            }
             //  $data['country']       = Country::pluck('name', 'short_name');
               $data['country']       = Country::get();

               if(isset($data['result']->property_address->country))
               {
                   $data['states'] = State::where('country_id',$data['result']->property_address->country)->get();
               }else{
                   $data['states'] = State::where('country_id',1)->get();
               }

               if(isset($data['result']->property_address->state))
               {
                   $data['districts'] = District::where('state_id',$data['result']->property_address->state)->get();
               }else{
                   $data['districts'] = District::where('state_id',1)->get();
               }
        }
        elseif ($step == 'amenities') {
            if ($request->isMethod('post') && is_array($request->amenities)) {
                $rooms = VillageProperties::find($request->id);
                $selectedAmenityIds = Amenities::select('id', 'type_id')->whereIn('id', $request->amenities)->get();
                $commonAmenityTypeId = AmenityType::orderby('id','asc')->value('id');

                $i = 0;
                foreach ($selectedAmenityIds as $id){
                    if ($id->type_id == $commonAmenityTypeId) {
                        $i++;
                        break;
                    }
                }

                if ($i>=1){
                    $rooms->amenities = implode(',', $request->amenities);
                    $rooms->save();
                    return redirect('admin/village-listing/'.$property_id.'/photos');
                } else {
                    Common::one_time_message('error', 'Choose at least one item from the Common Amenities');
                    return redirect('admin/village-listing/'.$property_id.'/amenities');
                }

            } elseif ($request->isMethod('post') && empty($request->amenities)) {
                Common::one_time_message('error', 'Choose at least one item from the Common Amenities');
                return redirect('admin/village-listing/'.$property_id.'/amenities');
            } else {
                $data['property_amenities'] = explode(',', $data['result']->amenities);
                $data['amenities']          = Amenities::where('status', 'Active')->get();
                $data['amenities_type']     = AmenityType::get();
            }

        }
        elseif ($step == 'photos') {
            if ($request->isMethod('post')) {
                if(isset($request->photos))
                {
                        if ($request->crop == 'crop' && $request->photos) {
                            $baseText = explode(";base64,", $request->photos);
                            $name = explode(".", $request->img_name);

                            $convertedImage = base64_decode($baseText[1]);
                            $request->request->add(['type'=>end($name)]);


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

                        $path = public_path('images/village_property/'.$property_id.'/');

                        if (!file_exists($path)) {
                            mkdir($path, 0777, true);
                        }

                        if ($request->crop == "crop") {
                            $image = $name[0].uniqid().'.'.end($name);
                            $uploaded = file_put_contents($path . $image, $convertedImage);
                        } else {
                            if (isset($_FILES["file"]["name"])) {
                                $tmp_name = $_FILES["file"]["tmp_name"];
                                $name = str_replace(' ', '_', $_FILES["file"]["name"]);
                                $ext = pathinfo($name, PATHINFO_EXTENSION);
                                $image = time() . '_' . $name;
                                $path = 'public/images/village_property/' . $property_id;
                                if ($ext == 'png' || $ext == 'jpg' || $ext == 'jpeg' || $ext == 'gif' || $ext == 'JPG') {
                                    $uploaded = move_uploaded_file($tmp_name, $path . "/" . $image);
                                }
                            }
                        }


                        if ($uploaded) {
                            $photo_exist_first = VillagePropertyPhotos::where('property_id', $property_id)->count();
                            if ($photo_exist_first != 0) {
                                $photo_exist = VillagePropertyPhotos::orderBy('serial', 'desc')
                                    ->where('property_id',$property_id)
                                    ->take(1)->first();
                            }
                            $photos = new VillagePropertyPhotos;
                            $photos->property_id = $property_id;
                            $photos->photo = $image;
                            if ($photo_exist_first != 0) {
                                $photos->serial = $photo_exist->serial + 1;
                            } else {
                                $photos->serial = $photo_exist_first + 1;
                            }
                            if (!$photo_exist_first) {
                                $photos->cover_photo = 1;
                            }

                            $photos->save();
                            $property_steps = VillagePropertySteps::where('property_id', $property_id)->first();
                            $property_steps->photos = 1;
                            $property_steps->save();
                        }
                }
                else{

                        // $validate = Validator::make($request->all(), [
                        //     'feature_img' => 'required|file|mimes:jpg,jpeg,bmp,png,gif,JPG',
                        //     'video_link' => 'required'
                        // ]);


                        // if ($validate->fails()) {
                        //     return back()->withErrors($validate)->withInput();
                        // }
                         $propertydata = VillageProperties::find($request->id);

                        if($request->hasfile('feature_img'))
                        {

                            $file = $request->file('feature_img');
                            $extenstion = $file->getClientOriginalExtension();
                            $filename ='feature-image'.time().'-'.date('Ymd').'.'.$extenstion;
                            $file->move('public/images/village_property/feature-image/', $filename);
                            $image = $filename;
                            $propertydata->feature_image = $image;
                        }
                        $propertydata->video_link = $request->input('video_link');
                        $propertydata->save();

                }

                return redirect('admin/village-listing/'.$property_id.'/photos')->with('success', 'File Uploaded Successfully!');

            }

            $data['photos']    = VillagePropertyPhotos::where('property_id', $property_id)
                                ->orderBy('serial', 'asc')
                                ->get();
        }
        elseif ($step == 'pricing') {
            if ($request->isMethod('post')) {
                $bookings = VillageBookings::where('property_id', $property_id)->where('currency_code', '!=', $request->currency_code)->first();
                if ($bookings) {
                    Common::one_time_message('error', __('Booking has been made using the current currency. It cannot be changed now'));
                    return redirect()->back();
                }
                $rules = array(
                    'price' => 'required|numeric|min:5',
                );

                $fieldNames = array(
                    'price'  => 'Price',
                );

                $validator = Validator::make($request->all(), $rules);
                $validator->setAttributeNames($fieldNames);

                if ($validator->fails()) {
                    return back()->withErrors($validator)->withInput();
                } else {
                    $property_price                    = VillagePropertyPrice::where('property_id', $property_id)->first();
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

                    $property_steps = VillagePropertySteps::where('property_id', $property_id)->first();
                    $property_steps->pricing = 1;
                    $property_steps->save();

                    return redirect('admin/village-listing/'.$property_id.'/booking');
                }
            }
        } elseif ($step == 'booking') {
            if ($request->isMethod('post')) {

                $property_steps          = VillagePropertySteps::where('property_id', $property_id)->first();
                $property_steps->booking = 1;
                $property_steps->save();

                $properties               = VillageProperties::find($property_id);
                $properties->booking_type = $request->booking_type;
                $properties->status       = ( $properties->steps_completed == 0 ) ?  'Listed' : 'Unlisted';
                $properties->save();

                return redirect('admin/village-listing/'.$property_id.'/calender');
            }
        } elseif ($step == 'calender') {
            $data['calendar'] = $calendar->generate($request->id);
        }

        elseif ($step == 'products') {

             if ($request->isMethod('post')) {

                $checkFarmhouse =  VillageFarmHouse::where('property_id',$property_id)->first();
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
                     $farmHouse = VillageFarmHouse::where('property_id',$property_id)->update($farm_house_data);
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
                    $farmHouse = VillageFarmHouse::create($farm_house_data);

                }



                return redirect('admin/village-listing/'.$property_id.'/type_of_organic_products');
             }

             $data['farm_house']  = VillageFarmHouse::where('property_id',$property_id)->first();
             if(isset($data['farm_house']))
             {
                  $data['districts'] = District::where('state_id',$data['farm_house']->state_id)->get();
             }
              $data['property_type']  = PropertyType::where('status', 'Active')->pluck('name', 'id');
              $data['farm_type']  = FarmType::where('status', 'Active')->get();
              $data['state']  = State::where('country_id',1)->get();
              $data['users'] = User::where('status','Active')->get();

        }
        elseif ($step == 'type_of_organic_products') {

             if ($request->isMethod('post')) {

                    $checkOrganicProduct =  VillageOrganicProduct::where('property_id',$property_id)->get();
                    if(isset($checkOrganicProduct))
                    {
                          VillageOrganicProduct::where('property_id',$property_id)->delete();

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
                        VillageOrganicProduct::create($product_data); // Assuming OrganicProduct is the model representing your table
                        $i++;
                    }


                return redirect('admin/village-listing/'.$property_id.'/sustainable_farm_practices');
             }

             $data['organic_products'] = VillageOrganicProduct::where('property_id',$property_id)->get();


        }
         elseif ($step == 'sustainable_farm_practices') {

             if ($request->isMethod('post')) {

                    $checkSustainableFarmings =  VillageFarmHouseSustainablePractice::where('property_id',$property_id)->get();
                    if(isset($checkSustainableFarmings))
                    {
                          VillageFarmHouseSustainablePractice::where('property_id',$property_id)->delete();

                    }

                   $sustainable_farmings = $request->input('sustainable_farming');

                      foreach($sustainable_farmings as $sustainable) {
                        $sustainable_data['property_id'] = $property_id;
                        $sustainable_data['sustainable_practice_id'] = $sustainable;
                        VillageFarmHouseSustainablePractice::create($sustainable_data);
                    }
                  return redirect('admin/village-listing/'.$property_id.'/irrigation_method_farm_practices');
             }
             $data['sustainableFarmings']  = FarmPractice::where('key' ,'sustainable_farming')->get();

              $data['sustainable_practices'] = VillageFarmHouseSustainablePractice::with(['sustainable_practice'])->where('property_id',$property_id)->get();

        }



         elseif ($step == 'irrigation_method_farm_practices') {


             if ($request->isMethod('post')) {
                    $checkIrrigationMethodPractice =  VillageFarmHouseIrrigationMethodPractice::where('property_id',$property_id)->get();
                    if(isset($checkIrrigationMethodPractice))
                    {
                          VillageFarmHouseIrrigationMethodPractice::where('property_id',$property_id)->delete();

                    }
                     $irrigation_method_farmings = $request->input('irrigation_method');
                      foreach($irrigation_method_farmings as $irrigation_method) {
                        $irrigation_method_data['property_id'] = $property_id;
                        $irrigation_method_data['irrigation_method_id'] = $irrigation_method;
                        VillageFarmHouseIrrigationMethodPractice::create($irrigation_method_data);
                    }
                  return redirect('admin/village-listing/'.$property_id.'/soil_health_and_fertility_practices');
             }
             $data['irrigationMethds'] = FarmPractice::where('key' ,'irrigation_method')->get();
             $data['irrigation_methds'] = VillageFarmHouseIrrigationMethodPractice::with(['irrigation_method'])->where('property_id',$property_id)->get();



        }
          elseif ($step == 'soil_health_and_fertility_practices') {

             if ($request->isMethod('post')) {

                    $checkSoilHealthFarmings =  VillageFarmHouseSoilHealthPractice::where('property_id',$property_id)->get();
                    if(isset($checkSoilHealthFarmings))
                    {
                          VillageFarmHouseSoilHealthPractice::where('property_id',$property_id)->delete();

                    }
                    $soil_health_farmings = $request->input('soil_health');

                      foreach($soil_health_farmings as $soil_health) {
                        $soil_health_data['property_id'] = $property_id;
                        $soil_health_data['soil_health_id'] = $soil_health;
                        VillageFarmHouseSoilHealthPractice::create($soil_health_data);
                    }
                   return redirect('admin/village-listing/'.$property_id.'/pest_and_disease_farm_practices');
             }
                $data['soilHealths'] = FarmPractice::where('key' ,'soil_health')->get();
                $data['soil_health_practices'] = VillageFarmHouseSoilHealthPractice::with(['soil_health_practice'])->where('property_id',$property_id)->get();



        }

           elseif ($step == 'pest_and_disease_farm_practices') {

             if ($request->isMethod('post')) {

                      $checkPestDiseaseFarmings =  VillageFarmHousePestDiseasePractice::where('property_id',$property_id)->get();
                    if(isset($checkPestDiseaseFarmings))
                    {
                        VillageFarmHousePestDiseasePractice::where('property_id',$property_id)->delete();

                    }
                      $pest_disease_farmings = $request->input('pest_disease');

                    foreach($pest_disease_farmings as $pest_disease) {
                        $pest_disease_data['property_id'] = $property_id;
                        $pest_disease_data['pest_disease_id'] = $pest_disease;
                        VillageFarmHousePestDiseasePractice::create($pest_disease_data);
                    }
                    return redirect('admin/village-listing/'.$property_id.'/location_near_me');
             }

              $data['pestDiseases'] = FarmPractice::where('key' ,'pest_disease')->get();
              $data['pest_disease_practices'] = VillageFarmHousePestDiseasePractice::with(['pest_disease_practice'])->where('property_id',$property_id)->get();


        }

       elseif ($step == 'location_near_me') {

             if ($request->isMethod('post')) {
                      $checkLocation =  VillageFarmHouseLocation::where('property_id',$property_id)->get();
                    if(isset($checkLocation))
                    {
                        VillageFarmHouseLocation::where('property_id',$property_id)->delete();

                    }
                    $location_titles = $request->input('title');
                    $distance= $request->input('distance');
                    $p=0;
                    foreach($location_titles as $title) {
                        $location_title_data['property_id'] = $property_id;
                        $location_title_data['location_title'] = $title;
                        $location_title_data['distance'] = $distance[$p];
                        VillageFarmHouseLocation::create($location_title_data);
                      $p++;
                    }
                   return redirect('admin/village-listing/'.$property_id.'/facilities');
             }
              $data['locations'] = VillageFarmHouseLocation::where('property_id',$property_id)->get();

        }
         elseif ($step == 'facilities') {

             if ($request->isMethod('post')) {

                   $checkfacility =  VillageFarmHouseFacility::where('property_id',$property_id)->get();
                    if(isset($checkfacility))
                    {
                        VillageFarmHouseFacility::where('property_id',$property_id)->delete();

                    }
                  $facilities = $request->input('facilities');

                  foreach($facilities as $facilitie) {
                        $facilitie_data['property_id'] = $property_id;
                        $facilitie_data['name'] = $facilitie;
                        VillageFarmHouseFacility::create($facilitie_data);
                    }
                 return redirect('admin/village-listing/'.$property_id.'/activities');
             }

              $data['facilities'] = VillageFarmHouseFacility::where('property_id',$property_id)->get();

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
                    $activity_description = $request->input('description');
                     $activity_images = $request->file('images');

                        if ($request->hasFile('images')) {

                            foreach ($activity_images as $key => $image) {
                                $activity_title_data['property_id'] = $property_id;
                                $activity_title_data['name'] = $activity_titles[$key];
                                $activity_title_data['price'] = $activity_price[$key];
                                $activity_title_data['description'] = $activity_description[$key];

                                if ($image->isValid()) {
                                    $extension = $image->getClientOriginalExtension();
                                    $filename = 'feature-image' . time() . '-' . rand(1000, 9999) . date('Ymd') . '.' . $extension;
                                    $image->move('public/images/activity/images/', $filename);
                                    $activity_title_data['image'] = $filename;
                                }

                                FarmHouseActivity::create($activity_title_data);
                            }
                        }


                     return redirect('admin/village-listing/'.$property_id.'/general_informations');
             }
            $data['activities'] = FarmHouseActivity::where('property_id',$property_id)->get();

        }

        elseif ($step == 'term_conditions') {

             if ($request->isMethod('post')) {
                    $property = VillageProperties::find($request->id);
                    $property->terms_condition = $request->input('terms_condition');
                    $property->save();
                    $data['result']  = VillageProperties::findOrFail($property_id);
             }
            //  return redirect('admin/village-listing/'.$property_id.'/term_conditions');
        }

        elseif ($step == 'general_informations') {

             if ($request->isMethod('post')) {
                // dd($request->all());
                       $farm_house_data['accomodation_type']  =$request->input('accomodation_type');
                       $farm_house_data['total_bedroom']  =$request->input('total_bedroom');
                       $farm_house_data['total_bathroom']  =$request->input('total_bathroom');
                       $farm_house_data['dimension']  =$request->input('dimension');
                       $farm_house_data['checkin_time']  =$request->input('checkin_time');
                       $farm_house_data['checkout_time']  =$request->input('checkout_time');
                       $farm_house_data['airport']  =$request->input('airport');
                       $farm_house_data['car_parking']  =$request->input('car_parking');
                       $farm_house_data['wifi_internet']  =$request->input('wifi_internet');
                       $farmHouse = VillageFarmHouse::where('property_id',$property_id)->update($farm_house_data);
                       return redirect('admin/village-listing/'.$property_id.'/general_informations');

             }
             $data['farmHouse'] = VillageFarmHouse::where('property_id',$property_id)->first();



        }

        return view("admin.village_properties.$step", $data);
    }

    public function update(Request $request)
    {
        if (! $request->isMethod('post')) {
              $amenity_type=AmenityType::get();
              $am = [];
            foreach ($amenity_type as $key => $value) {
                $am[$value->id]=$value->name;
            }
              $data['am'] = $am;
            $data['result'] = Amenities::find($request->id);
            return view('admin.amenities.edit', $data);
        } elseif ($request->isMethod('post')) {
            $rules = array(
                    'title'          => 'required',
                    'description'    => 'required',
                    'symbol'         => 'required',
                    'type_id'        => 'required',
                    'status'         => 'required'

                    );

            $fieldNames = array(
                        'title'             => 'Title',
                        'description'       => 'Description',
                        'symbol'            => 'Symbol'
                        );

            $validator = Validator::make($request->all(), $rules);
            $validator->setAttributeNames($fieldNames);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            } else {
                $amenitie = Amenities::find($request->id);
                $amenitie->title          = $request->title;
                $amenitie->description    = $request->description;
                $amenitie->symbol         = $request->symbol;
                $amenitie->type_id        = $request->type_id;
                $amenitie->status         = $request->status;
                $amenitie->save();

                Common::one_time_message('success', 'Updated Successfully');
                return redirect('admin/amenities');
            }
        }
    }

    public function delete(Request $request)
    {
        $bookings   = VillageBookings::where(['property_id' => $request->id])->get()->toArray();
        if (env('APP_MODE', '') != 'test') {
            if (count($bookings) > 0) {
               Common::one_time_message('danger', 'This Property has Bookings. Sorry can not possible to delete');
            } else {
                VillageProperties::find($request->id)->delete();
                Common::one_time_message('success', 'Deleted Successfully');
                return redirect('admin/properties');
             }
         }
         return redirect('admin/properties');
    }

    public function photoMessage(Request $request)
    {
           $property = VillageProperties::find($request->id);
            $photos  = VillagePropertyPhotos::find($request->photo_id);
            $photos->message = $request->messages;
            $photos->save();

        return json_encode(['success'=>'true']);
    }

    public function photoDelete(Request $request)
    {

            $property = VillageProperties::find($request->id);
            $photos   = VillagePropertyPhotos::find($request->photo_id);
            $photos->delete();

        return json_encode(['success'=>'true']);
    }

    public function makeDefaultPhoto(Request $request)
    {

        if ($request->option_value == 'Yes') {
            VillagePropertyPhotos::where('property_id', '=', $request->property_id)
            ->update(['cover_photo' => 0]);

            $photos = VillagePropertyPhotos::find($request->photo_id);
            $photos->cover_photo = 1;
            $photos->save();
        }
        return json_encode(['success'=>'true']);
    }

    public function makePhotoSerial(Request $request)
    {

        $photos         = VillagePropertyPhotos::find($request->id);
        $photos->serial = $request->serial;
        $photos->save();

        return json_encode(['success'=>'true']);
    }

    public function propertyCsv($id = null)
    {
        return Excel::download(new PropertiesExport, 'properties_sheet' . time() .'.xls');
    }

    public function propertyPdf($id = null)
    {
        $to                 = setDateForDb(request()->to);
        $from               = setDateForDb(request()->from);

        $data['status']     = $status = isset(request()->status) ? request()->status : null;
        $data['space_type'] = $space_type = isset(request()->space_type) ? request()->space_type : null;

        $properties = $this->getAllProperties();

        if (isset($id)) {
            $properties->where('properties.host_id', '=', $id);
        }

        if ($from) {
            $properties->whereDate('properties.created_at', '>=', $from);
        }

        if ($to) {
            $properties->whereDate('properties.created_at', '<=', $to);
        }

        if (!is_null($status)) {
            $properties->where('properties.status', '=', $status);
        }

        if ($space_type) {
            $properties->where('properties.space_type', '=', $space_type);
        }

        $data['propertyList'] = $properties->get();

        if ($from && $to) {
            $data['date_range'] = onlyFormat($from) . ' To ' . onlyFormat($to);
        }

        $pdf = PDF::loadView('admin.properties.list_pdf', $data, [], [
            'format' => 'A3', [750, 1060]
          ]);
        return $pdf->download('property_list_' . time() . '.pdf', array("Attachment" => 0));
    }

    public function getAllProperties()
    {
        $query = VillageProperties::join('users', function ($join) {
            $join->on('users.id', '=', 'properties.host_id');
        })
            ->join('space_type', function ($join) {
                    $join->on('space_type.id', '=', 'properties.space_type');
            })

            ->select(['properties.id as properties_id', 'properties.name as property_name', 'properties.status as property_status', 'properties.created_at as property_created_at', 'properties.updated_at as property_updated_at','space_type.name as Space_type_name' , 'properties.*', 'users.*', 'space_type.*'])
            ->orderBy('properties.id', 'desc');
            return $query;
    }


    public function featuredStatusUpdate(Request $request){
            $id =  $request->input('id');
            $status = $request->input('value');
            VillageProperties::where('id',$id)->update(['featured_status'=>$status]);
            return "success";

    }


}
