<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'products';

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
    protected $fillable = ['title', 'price', 'price2', 'photo', 'pet_category_id', 'link', 'type', 'promotion','partner_id','description'];

    public function order_products(){
        return $this->hasMany('App\Models\OrderProduct', 'product_id'); 
    }  
    public function images(){
        return $this->hasMany('Images::class'); 
    }  
    public function partner(){
        return $this->belongsTo('App\Models\Partner', 'partner_id'); 
    }
    public function pet_category(){
        return $this->hasOne('App\Models\Pet_Category', 'id' , 'pet_category_id'); 
    } 
}
