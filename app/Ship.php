<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ship extends Model
{
    public function cabin() {
    	return $this->hasMany('App\Cabin');
    }

    public function cruise() {
    	return $this->belongsTo('App\Cruise');
    }
}
