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
    VillageProperties,
    Properties,
    PayoutPenalties,
    PropertyDates,
    PropertyFees,
    Settings,
    Currency,
    Country,
    Contact,
    ActivityType,
    District,
    PropertyAddress,
    VillagePropertyAddress,
    DefaultImage
};
use Stevebauman\Location\Facades\Location;
use Modules\Gateway\Entities\GatewayModule;

class FarmHouseController extends Controller
{
    private $helper;

    public function __construct()
    {
        $this->helper = new Common;
    }

    public function farmHouse(Request $request)
    {
        $data['activityTypes'] = ActivityType::where('status', 'active')->get();
        $propertiesQuery = Properties::with(['property_price'])->orderBy('id', 'desc');

        // Get user's IP address
        $ip = request()->ip();
        $data['location'] = \Location::get($ip);

        // Check if a location is specified in the request
        if ($request->has('location') && $request->location !== null) {
            // Search for the district with the specified name
            $city = District::where('name', 'LIKE', $request->location)->first();
            if ($city) {
                // If the district is found, get properties matching the city
                $propertiesWithCityMatched = PropertyAddress::where('city', $city->id)->pluck('property_id')->toArray();

                if (!empty($propertiesWithCityMatched)) {
                    // Filter properties by matching property IDs
                    $propertiesQuery->whereIn('id', $propertiesWithCityMatched);
                } else {
                    // If no properties are found for the city, return empty result
                    $propertiesQuery->where('id', null);
                }
            } else {
                // If the city is not found, return empty result
                $propertiesQuery->where('id', null);
            }
        }

        // Execute the query and get properties
        $data['properties'] = $propertiesQuery->get();

        $data['defaultImage'] = DefaultImage::first();

        return view('home.farm_house')->with(compact('data'));
    }


   public function villageFarmHouse(Request $request)
    {
        $data['activityTypes'] = ActivityType::where('status', 'active')->get();
        $propertiesQuery = VillageProperties::with(['property_price'])->orderby('id','desc');

        // Get user's IP address
        $ip = request()->ip();
        $data['location'] = \Location::get($ip);
        // Check if a location is specified in the request
        if ($request->has('location') && $request->location !== null) {
            // Search for the district with the specified name
            $city = District::where('name', 'LIKE', $request->location)->first();
            if ($city) {
                // If the district is found, get properties matching the city
                $propertiesWithCityMatched = VillagePropertyAddress::where('city', $city->id)->pluck('property_id')->toArray();

                if (!empty($propertiesWithCityMatched)) {
                    // Filter properties by matching property IDs
                    $propertiesQuery->whereIn('id', $propertiesWithCityMatched);
                } else {
                    // If no properties are found for the city, return empty result
                    $propertiesQuery->where('id', null);
                }
            } else {
                // If the city is not found, return empty result
                $propertiesQuery->where('id', null);
            }
        }

        // Execute the query and get properties
        $data['properties'] = $propertiesQuery->get();

        return view('home.village_farm_house')->with(compact('data'));
    }

   public function fetchCities(Request $request)
   {
       $query = $request->input('query');
       $cities = District::where('name', 'like', '%' . $query . '%')->get();

       $output = '';
       foreach ($cities as $city) {
           $output .= '<div class="city-suggestion" data-city="' . $city->name . '">' . $city->name .'</div>';
       }

       return $output;
   }


}
