<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VillagePropertyDetails extends Model
{
    use HasFactory;

    protected $table    = 'village_property_details';
    public $timestamps  = false;
    protected $fillable = ['property_id', 'field', 'value'];

    public function properties()
    {
        return $this->belongsTo('App\Models\VillageProperties', 'property_id', 'id');
    }
}
