<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VillagePropertyDescription extends Model
{
    protected $table   = 'village_property_description';

    public $timestamps = false;

    public function properties()
    {
        return $this->belongsTo('App\Models\VillageProperties', 'property_id', 'id');
    }
}
