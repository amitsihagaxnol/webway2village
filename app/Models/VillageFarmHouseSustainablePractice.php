<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VillageFarmHouseSustainablePractice extends Model
{
    protected $table = 'village_farm_house_sustainable_practices';

    protected $fillable = [
        'property_id', 'sustainable_practice_id','created_at','updated_at'
    ];

    public function sustainable_practice()
    {
        return $this->hasOne('App\Models\FarmPractice', 'id','sustainable_practice_id');
    }
}
