<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FarmHouseActivity extends Model
{
    protected $table = 'farm_house_activities';

    protected $fillable = [
             'property_id','name','price','description','image','status','created_at','updated_at'
    ];
}
