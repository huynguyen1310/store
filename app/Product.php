<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];

    public function productType() {
        return $this->belongsTo(ProductType::class,'idProductType','id');
    }

    public function category() {
        return $this->belongsTo(Category::class,'idCategory','id');
    }
}
