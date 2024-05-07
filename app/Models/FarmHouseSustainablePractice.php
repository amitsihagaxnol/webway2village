<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FarmHouseSustainablePractice extends Model
{
    protected $table = 'farm_house_sustainable_practices';

    protected $fillable = [
        'property_id', 'sustainable_practice_id','created_at','updated_at'
    ];
    
    public function sustainable_practice()
    {
        return $this->hasOne('App\Models\FarmPractice', 'id','sustainable_practice_id');
    }
}
