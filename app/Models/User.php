<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'provider_id',
        'avatar',
        'country',
        'ip_address',
        'role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function profile(){
        return $this->hasOne('App\Models\Profile', 'user_id' , 'id'); 
    } 
    public function pets(){
        return $this->hasMany('App\Models\Pet', 'user_id'); 
    } 
    public function posts(){
        return $this->hasMany('App\Models\Post', 'user_id'); 
    }
    public function comments(){
        return $this->hasMany('App\Models\Comment', 'user_id'); 
    }
    public function adoptpet(){
        return $this->hasMany('App\Models\Adoptpet', 'user_id'); 
    }
    public function order_products(){
        return $this->hasMany('App\Models\OrderProduct', 'user_id'); 
    }   
}
