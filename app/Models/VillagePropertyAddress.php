<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VillagePropertyAddress extends Model
{
    use HasFactory;

    protected $table   = 'village_property_address';
    public $timestamps = false;

    public function properties()
    {
        return $this->belongsTo('App\Models\VillageProperties', 'property_id', 'id');
    }

    public function countries()
    {
        return $this->belongsTo('App\Models\Country', 'country', 'short_name');
    }

    public function getCountryNameAttribute()
    {
        $result = Country::where('short_name', $this->attributes['id'])->first();
        $name = '';
        if (isset($result->name)) {
            $name = $result->name;
        }
        return $name;
    }
}
