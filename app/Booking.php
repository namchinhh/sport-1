<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $guarded = ['id'];

    protected $table = 'bookings';

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function options()
    {
        return $this->hasOne('App\Option');
    }

    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
