<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    public function inCart(){

        return $this->HasOne(Cart::class);

    }
}
