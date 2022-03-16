<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blood_bank extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'blood_banks';

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
    protected $fillable = ['pet_id', 'user_id', 'quantity', 'total_blood', 'location'];

    public function Pet(){
        return $this->belongsTo('App\Models\Pet', 'pet_id'); 
    }
}
