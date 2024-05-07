<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VillageFarmHouseLocation extends Model
{
    protected $table = 'village_farm_house_locations';

    protected $fillable = [
        'property_id', 'location_title','distance','facilities','activity_title','activity_price','flag','created_at','updated_at'];
}
