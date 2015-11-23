<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Passenger extends Model
{
	public function cabin() {
    	return $this->belongsTo('App\Cabin');
    }

    protected $fillable = array(
    	'name', 
    	'title', 
    	'age', 
    	'sex', 
    	'address_line1', 
    	'address_line2',
    	'address_line3',
    	'state',
    	'country',
    	'occupation',
    	'reservation_id',
    	'cabin_id'
    );
}
