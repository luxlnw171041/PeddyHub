<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'pets';

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
    protected $fillable = ['user_id', 'name', 'birth', 'photo', 'gender', 'size', 'age' ,'pet_category_id','sub_category','photo_2','photo_3','certificate','certificate_2','certificate_3',
    'species','blood_type','photo_medical_certificate','photo_vaccine','photo_vaccine_2','photo_vaccine_3','qr_code','date_vaccine_rabies','date_next_rabies','date_vaccine_flea','date_next_flea'];
    
    public function user(){
        return $this->belongsTo('App\Models\User', 'user_id'); 
    }
    public function profile(){
        return $this->belongsTo('App\Models\Profile', 'user_id'); 
    }
    public function lost_pet(){
        return $this->belongsTo('App\Models\Lost_Pet', 'pet_id'); 
    }
    public function Blood_bank(){
        return $this->hasMany('App\Models\Blood_bank', 'pet_id'); 
    } 
    public function pet_category(){
        return $this->hasOne('App\Models\Pet_Category', 'id' , 'pet_category_id'); 
    } 
}
