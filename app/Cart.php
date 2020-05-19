<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    //
    protected $fillable = [
        'quantity',
    ];

    public function product(){

        return $this->belongsTo(Product::class, 'product_id');

    }
}
