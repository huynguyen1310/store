<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $guard = [];

    public function order() {
        return $this->belongsTo(Order::class,'idOrder','id');
    }

    public function product() {
        return $this->belongsTo(Product::class,'idProduct','id');
    }
}
