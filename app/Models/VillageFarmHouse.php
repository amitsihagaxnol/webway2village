<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VillageFarmHouse extends Model
{
    use HasFactory;
    protected $table    = 'village_farm_houses';

    protected $fillable  = ['id','property_id','user_id','property_type_id','farm_type_id','state_id','district_id','location','postal_code','farm_title','full_address','contact_number','landline_number','start_year','farm_detail','farm_size','certification_detail','accomodation_type','total_bedroom','total_bathroom','dimension','checkin_time','checkout_time','airport','car_parking','wifi_internet','status','created_at','updated_at'];


      public function farm_type()
    {
         return $this->hasOne('App\Models\FarmType', 'id', 'farm_type_id');

    }

    public function property_type()
    {
         return $this->hasOne('App\Models\PropertyType', 'id', 'property_type_id');

    }
}
