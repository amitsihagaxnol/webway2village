<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VillageOrganicProduct extends Model
{

    protected $table = 'village_organic_products';
    protected $fillable = ['property_id','product_title','price','seasonal_availability','description','product_availability','created_at','updated_at'];

}
