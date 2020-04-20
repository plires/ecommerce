<?php

namespace App;

use App\User;
use App\CartDetail;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function details(){
        return $this->hasMany(CartDetail::class);
    }
}
