<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'comments';

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
    protected $fillable = ['content', 'user_id', 'post_id'];

    public function post(){
        return $this->belongsTo('App\Models\Post', 'post_id'); 
    }

    public function user(){
        return $this->belongsTo('App\Models\User', 'user_id'); 
    }
    public function profile(){
        return $this->belongsTo('App\Models\Profile', 'user_id'); 
    }
}
