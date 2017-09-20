<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Passenger extends Model
{
	protected $table = 'passengers';

	public function user(){
    	//suveda uzeri pagal user_id is passenger lenteles
		return $this->hasOne('App\User', 'id', 'user_id');

	}
}
