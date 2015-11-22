<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cruise extends Model
{
    protected $dates = array('departure', 'arrival');

	public function ship() {
    	return $this->hasOne('App\Ship');
    }

    public function cabin() {
    	return $this->hasManyThrough('App\Cabin', 'App\Ship');
    }

    public function reservation() {
    	return $this->hasMany('App\Reservation');
    }

    public function port() {
    	return $this->hasMany('App\Port');
    }
}
