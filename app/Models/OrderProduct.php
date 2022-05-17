<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'order_products';

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
    protected $fillable = ['order_id', 'product_id', 'user_id', 'quantity', 'price', 'total'];

    public function product(){
        return $this->belongsTo('App\Models\Product', 'product_id'); 
    }
    public function user(){
        return $this->belongsTo('App\Models\User', 'user_id'); 
    }
    public function profile(){
        return $this->belongsTo('App\Models\Profile', 'user_id'); 
    }
}
