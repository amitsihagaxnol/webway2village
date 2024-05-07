<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VillageFarmHouseIrrigationMethodPractice extends Model
{
    protected $table = 'village_farm_house_irrigation_method_practices';

     protected $fillable = [
        'property_id', 'irrigation_method_id','created_at','updated_at'
    ];

     public function irrigation_method()
    {
        return $this->hasOne('App\Models\FarmPractice', 'id','irrigation_method_id');
    }
}
