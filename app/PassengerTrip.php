<?php

namespace App;
use App\user;

use Illuminate\Database\Eloquent\Model;

class PassengerTrip extends Model
{
    protected $table = 'passengers_trips';

    public function user()
   	{
   		return $this->belongsTo('App\User', 'passenger_id','id');
   	}
}
