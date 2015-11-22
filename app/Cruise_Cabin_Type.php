<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cruise_Cabin_Type extends Model
{
	protected $table = "cruise_cabin_type";

    public function cruise() {
    	return $this->belongsTo('App\Cruise');
    }

    public function cabin() {
    	return $this->hasMany('App\Cabin');
    }
}
