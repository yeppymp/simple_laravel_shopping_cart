<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartProduct extends Model
{
    protected $fillable = ['id_product', 'id_cart', 'qty'];

    public function product()
    {
        return $this->belongsTo('App\Product', 'id_product');
    }
}
