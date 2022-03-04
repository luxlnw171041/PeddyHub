<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'profiles';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'name', 'photo', 'phone', 'birth', 'sex', 'type', 'language','tambon_th','amphoe_th' ,'changwat_th'];

    public function user(){
        return $this->belongsTo('App\Models\User', 'user_id'); 
    }

    public function lost_pets(){
        return $this->hasMany('App\Models\Lost_Pet', 'user_id' , 'user_id'); 
    } 

    public function pets(){
        return $this->hasMany('App\Models\Pet', 'user_id'); 
    } 
    
}
