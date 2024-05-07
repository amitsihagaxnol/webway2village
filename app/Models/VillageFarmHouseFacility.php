<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VillageFarmHouseFacility extends Model
{
    protected $table = 'village_farm_house_facilities';

    protected $fillable = [
             'property_id','name','status','created_at','updated_at'
    ];
}
