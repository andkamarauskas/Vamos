<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'surname',
        'phone',
        'city',
        'car',
        'car_year',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function drives()
    {
        return $this->hasMany('App\Trip' , 'driver_id');
    }
    public function hobbies()
    {
        return $this->belongsToMany('App\Hobby','user_hobby');
    }
    public function tripsAsPassenger()
    {
        return $this->belongsToMany('App\Trip', 'passengers');
    }
    public function reviews()
    {
        return $this->hasMany('App\Review','user_id');
    }
}
