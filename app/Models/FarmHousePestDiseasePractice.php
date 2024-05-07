<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FarmHousePestDiseasePractice extends Model
{
    protected $table = 'farm_house_pest_disease_practices';

     protected $fillable = [
        'property_id', 'pest_disease_id','created_at','updated_at'
    ];
    
      public function pest_disease_practice()
    {
        return $this->hasOne('App\Models\FarmPractice', 'id','pest_disease_id');
    }
}
