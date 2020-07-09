<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = ['total', 'id_user'];

    public function user()
    {
        return $this->belongsTo('App\User', 'id_user');
    }

    public function cart_products()
    {
        return $this->hasMany('App\CartProduct', 'id_cart');
    }
}
