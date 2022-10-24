<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Partner_token extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'partner_tokens';

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
    protected $fillable = ['name_partner', 'partner_id', 'token'];

    
}
