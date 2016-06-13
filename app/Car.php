<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $table = 'Cars';

    public function owner(){
        return $this->belongsTo('App\User','user_id');
    }

    public function bookings(){
        return $this->hasMany('App\Booking','car_id');
    }
}
