<?php

namespace App;

use App\Cart;
use App\Product;
use Illuminate\Database\Eloquent\Model;

class CartDetail extends Model
{
    public function cart(){
        return $this->belongsTo(Cart::class);
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }
}