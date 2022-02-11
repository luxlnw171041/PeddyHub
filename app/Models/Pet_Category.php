<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pet_Category extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'pet__categories';

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
    protected $fillable = ['name'];

    
}
