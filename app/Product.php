<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guard = [];

    public function productType() {
        return $this->belongsTo(Product::class,'idProductType','id');
    }

    public function category() {
        return $this->belongsTo(Category::class,'idCategory','id');
    }
}
