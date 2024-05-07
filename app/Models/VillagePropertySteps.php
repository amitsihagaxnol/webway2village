<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VillagePropertySteps extends Model
{
    use HasFactory;
    protected $table   = 'village_property_steps';
    public $timestamps = false;

    public function property()
    {
        return $this->belongsTo('App\Models\VillageProperties', 'property_id', 'id');
    }
}
