<?php

/**
 * Bookings Model
 *
 * Bookings Model manages Bookings operation.
 *
 * @category   Bookings
 * @package    vRent
 * @author     Techvillage Dev Team
 * @copyright  2020 Techvillage
 * @license
 * @version    2.7
 * @link       http://techvill.net
 * @since      Version 1.3
 * @deprecated None
 */

namespace App\Models;

use Illuminate\Database\Eloquent\{
    Model,
    SoftDeletes
};
use App\Models\{
    Payouts,
    Penalty,
    Currency,
    Accounts
};
use Session, DateTime;

class Bookings extends Model
{
    use SoftDeletes;

    protected $table = 'bookings';


    public function users()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    public function host()
    {
        return $this->belongsTo('App\Models\User', 'host_id', 'id');
    }

    public function properties()
    {
        return $this->belongsTo('App\Models\Properties', 'property_id', 'id');
    }


    public function reviews()
    {
        return $this->hasMany('App\Models\Reviews', 'booking_id', 'id');
    }

    public function messages()
    {
        return $this->hasMany('App\Models\Messages', 'booking_id', 'id');
    }

    public function currency()
    {
        return $this->belongsTo('App\Models\Currency', 'currency_code', 'code');
    }

    public function bank() {
        return $this->belongsTo('App\Models\Bank');
    }

    public function bookingFacility() {
        return $this->hasMany('App\Models\BookingFacility', 'booking_id', 'id');
    }

    public function bookingActivity() {
        return $this->hasMany('App\Models\BookingActivity', 'booking_id', 'id');
    }







}
