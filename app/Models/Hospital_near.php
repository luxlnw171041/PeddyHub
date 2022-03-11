<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hospital_near extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'hospital_nears';

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
    protected $fillable = ['name', 'lat', 'lng', 'photo', 'address', 'business_hours', 'phone','tambon_th','amphoe_th','changwat_th','recommend'];

    
}
