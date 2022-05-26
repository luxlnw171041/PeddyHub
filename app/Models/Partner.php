<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'partners';

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
    protected $fillable = ['name', 'phone', 'lat', 'lng', 'logo', 'province', 'district ', 'sub_district','name_area'];

    public function products(){
        return $this->hasMany('App\Models\Product', 'partner_id'); 
    }  
}
