<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VillageFarmHouseActivity extends Model
{
    protected $table = 'village_farm_house_activities';

    protected $fillable = [
             'property_id','name','price','description','image','status','created_at','updated_at'
    ];
}
