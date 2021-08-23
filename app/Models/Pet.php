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
    protected $fillable = ['user_id', 'name', 'birth', 'photo', 'gender', 'size', 'age'];

    public function user(){
        return $this->belongsTo('App\User', 'user_id'); 
    }

}
