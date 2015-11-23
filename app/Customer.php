<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public function reservation() {
    	return $this->hasOne('App\Reservation');
    }

    public function passenger() {
    	return $this->hasManyThrough('App\Passenger', 'App\Reservation');
    }

    protected $table = "users";
}
