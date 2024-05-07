<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrganicProduct extends Model
{
   
    protected $fillable = ['property_id','product_title','price','seasonal_availability','description','product_availability','created_at','updated_at'];

}