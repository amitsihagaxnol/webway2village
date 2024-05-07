<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingFacility extends Model
{
    use HasFactory;

    protected $table = "booking_facilities";

    protected $fillable = [
        'booking_id',
        'facility_id',
        'facility_name',
        'facility_price'
    ];
}
