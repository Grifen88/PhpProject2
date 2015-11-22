<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cabin extends Model
{
    public function ship() {
    	return $this->belongsTo('App\Ship');
    }

    public function passenger() {
    	return $this->hasMany('App\Passenger');
    }

    public function cruise_cabin_type() {
    	return $this->hasOne('App\Cruise_Cabin_Type');
    }
}
