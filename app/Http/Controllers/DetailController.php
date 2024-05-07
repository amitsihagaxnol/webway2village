<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\State;
use App\Models\District;
use App\Models\FarmPractice;
use App\Models\FarmHouse;
use App\Models\Properties;
use App\Models\PropertyRoomType;
use App\Models\RoomType;
use App\Models\Country;
use App\Models\City;
use App\Models\Facility;
use App\Models\Page;
use App\Models\VillageProperties;
use App\Models\FarmHouseActivity;
use App\Models\FarmHouseFacility;
use Eluceo\iCal\Property;
use Illuminate\Http\Request;

class DetailController extends Controller
{

    public function sustainableDetails(Request $request){

            $sustainableDetails = FarmPractice::where(['id'=>$request->sustainable_id,'key'=>'sustainable_farming'])->first();
            return $sustainableDetails->description;
    }

    public function irrigationDetails(Request $request){

            $irrigationDetails = FarmPractice::where(['id'=>$request->irrigation_id,'key'=>'irrigation_method'])->first();
            return $irrigationDetails->description;
    }

      public function soilHealthDetails(Request $request){

            $soilHealthDetails = FarmPractice::where(['id'=>$request->soil_health_id,'key'=>'soil_health'])->first();
            return $soilHealthDetails->description;
    }

     public function pestDiseaseDetails(Request $request){

            $pestDiseaseDetails = FarmPractice::where(['id'=>$request->pest_disease_id,'key'=>'pest_disease'])->first();
            return $pestDiseaseDetails->description;
    }

     public function listingDetail($id){

        $property = Properties::with(
            [
                'property_price','property_description','property_type',
                'farm_house.farm_type','farm_house.property_type',
                'farm_facility','farm_activity','organic_product',
                'property_room_types','farm_locations_nearby',
                'farm_sustainable_practices',
                'farm_house_irrigation_practice',
                'farm_house_pest_disease_practice',
                'farm_house_soil_health_practice',
                'property_photos'
            ])->where('id',$id)->first();

        // dd($property);
        return view('home.listingDetail')->with(compact('property'));
    }

    public function villageListingDetail($id){

        $property = VillageProperties::with(
            [
                'property_price','property_description','property_type',
                'farm_house.farm_type','farm_house.property_type',
                'farm_facility','farm_activity','organic_product',
                'property_room_types','farm_locations_nearby',
                'farm_sustainable_practices',
                'farm_house_irrigation_practice',
                'farm_house_pest_disease_practice',
                'farm_house_soil_health_practice'
            ])->where('id',$id)->first();

        // dd($property);
        return view('home.village_listingDetail')->with(compact('property'));
    }


    public function ajaxBookingDetails(Request $request)
    {
        $roomId = $request->room_id;
        $propertyId = $request->propertyId;
        $roomType  = PropertyRoomType::where('property_id', $propertyId)->where('id', $roomId)->first();
        return response()->json(
            [
                'status' => 'ok',
                'data' => $roomType
            ]
        );

    }

    public function propertyBookForm(Request $request)
    {
        $bookingNo = 'BK_' . sprintf('%04d', mt_rand(1, 9999));
        $data = $request->all();
        $data['facilityId'] = $data['facilityId'];
        $data['activityId'] = $data['activityId'];
        $propertyId = $data['property_id'];

        $bookingDate = now();

        $property = Properties::find($propertyId);
        $roomType = PropertyRoomType::where('id', $data['room_type'])->first();
        $roomTypeDetail = $roomType->roomType;
        $propertyAddress =  $property->property_address;
        $location['country'] = Country::find($propertyAddress->country);
        $location['state'] = State::find($propertyAddress->state);
        $location['city'] = District::find($propertyAddress->city);
        $page['refund'] = Page::where('name', 'Refund')->first();
        $page['cancellation'] = Page::where('name', 'Cancellation')->first();

        $activityIds = explode(',', $request->input('activityId')[0]);
        $facilityIds = explode(',', $request->input('facilityId')[0]);

        $activityRecords = FarmHouseActivity::whereIn('id', $activityIds)->get();
        $facilityRecords = FarmHouseFacility::whereIn('id', $activityIds)->get();

        $request->session()->put('booking_details', [
            'data' => $data,
            'bookingNo' => $bookingNo,
            'bookingDate' => $bookingDate,
            'property' => $property,
            'activityRecords' => $activityRecords,
            'facilityRecords' => $facilityRecords,
        ]);

        $bookingDetails = session()->get('booking_details');

        return view('home.final_confirmation_page', compact('data', 'bookingNo', 'bookingDate','property','roomTypeDetail','location','page','activityRecords','facilityRecords'));
    }


}


