<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Adoptpet extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'adoptpets';

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
    protected $fillable = ['titel', 'detail', 'user_id', 'photo', 'gender', 'size', 'age' ,'photo2','photo3','photo4','photo5','pet_category_id'];

    public function user(){
        return $this->belongsTo('App\Models\User', 'user_id'); 
    }
}
