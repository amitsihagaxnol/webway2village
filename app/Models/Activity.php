<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;
    
    public function activity_products()
    {
        return $this->hasMany('App\Models\ActivityProduct', 'activity_id', 'id');
    }
    
     public function activity_images()
    {
        return $this->hasMany('App\Models\ActivityImage', 'activity_id', 'id');
    }
   
    public function state()
    {
        return $this->hasOne('App\Models\State', 'id','state_id');
    }
    
    public function district()
    {
        return $this->hasOne('App\Models\District', 'id', 'district_id' );
    }
}
