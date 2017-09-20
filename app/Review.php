<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    //
    protected $table = 'reviews';

    public function user()
   	{
   		return $this->belongsTo('App\User', 'user_id','id');
   	}
   	public function respondent()
   	{
   		return $this->belongsTo('App\User', 'respondent_id','id');
   	}
}
