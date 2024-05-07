<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FarmHouseSoilHealthPractice extends Model
{
    protected $table = 'farm_house_soil_health_practices';

     protected $fillable = [
        'property_id', 'soil_health_id','created_at','updated_at'
    ];
     public function soil_health_practice()
    {
        return $this->hasOne('App\Models\FarmPractice', 'id','soil_health_id');
    }
}
