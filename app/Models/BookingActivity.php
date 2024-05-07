<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingActivity extends Model
{
    use HasFactory;

    protected $table = "booking_activities";

    protected $fillable = [
        'booking_id',
        'activity_id',
        'activity_name',
        'activity_price'
    ];
}
