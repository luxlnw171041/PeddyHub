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
    protected $fillable = ['user_id', 'name', 'birth', 'photo', 'gender', 'size', 'age' ,'pet_category_id'];

    public function user(){
        return $this->belongsTo('App\Models\User', 'user_id'); 
    }
    public function profile(){
        return $this->belongsTo('App\Models\Profile', 'user_id'); 
    }
    public function lost_pet(){
        return $this->belongsTo('App\Models\Lost_Pet', 'pet_id'); 
    }

}
