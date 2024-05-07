<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FarmHouseIrrigationMethodPractice extends Model
{
    protected $table = 'farm_house_irrigation_method_practices';

     protected $fillable = [
        'property_id', 'irrigation_method_id','created_at','updated_at'
    ];
    
     public function irrigation_method()
    {
        return $this->hasOne('App\Models\FarmPractice', 'id','irrigation_method_id');
    }
}
