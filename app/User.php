<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id'
    ];


    public function setNameAttribute($value){
        $this->attributes['name'] = ucwords(strtolower($value));
    }
    public function setEmailAttribute($value){
        $this->attributes['email'] = strtolower($value);
    }


    public function role(){
        return $this->belongsTo('App\Role');
    }
    public function posts(){
        return $this->hasMany('App\Post');
    }
}
