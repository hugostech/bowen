<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    public function client(){
        return $this->belongsTo('App\User','client_id');
    }

    public function car(){
        return $this->belongsTo('App\Car','car_id');
    }

    public function services(){
        return $this->belongsToMany('App\Service','booking_items','booking_id','service_id');
    }
}
