<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    protected $table = 'trips';

    public function user()
   	{
   		return $this->belongsTo('App\User', 'driver_id','id');
   	}
   	public function passenger()
   	{
   		return $this->hasMany('App\Passenger', 'trip_id');
   	}

   	public function comment()
   	{
   		return $this->hasMany('App\Comment', 'trip_id');
   	}
}
