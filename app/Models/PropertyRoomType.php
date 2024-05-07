<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyRoomType extends Model
{
    use HasFactory;

    protected $table = 'property_room_types';

    protected $fillable = [
        'room_type',
        'total',
        'available',
        'status',
        'price_per_night',
        'for_adults',
        'for_childrens',
        'is_default'
    ];

    public function roomType()
    {
        return $this->belongsTo(RoomType::class, 'room_type', 'id');
    }
}
