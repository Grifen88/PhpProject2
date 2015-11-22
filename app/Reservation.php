<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    public function cruise() {
    	return $this->belongsTo('App\Cruise');
    }

    public function customer() {
    	return $this->belongsTo('App\Customer');
    }

    public function cabin() {
    	return $this->hasMany('App\Cabin');
    }

    public function passenger() {
    	return $this->hasManyThrough('App\Cabin', 'App\Passenger');
    }

    protected $fillable = array(
        'cruise_id',
        'cabin_id',
        'customer_id'
    );
}
