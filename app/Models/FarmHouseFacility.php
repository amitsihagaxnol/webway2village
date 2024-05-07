<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FarmHouseFacility extends Model
{
    protected $table = 'farm_house_facilities';

    protected $fillable = [
             'property_id','name','facility_code','facility_id','description','price','status','created_at','updated_at'
    ];
}
