<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];

    public function productType() {
        return $this->hasMany(ProductType::class,'idCategory','id');
    }
}
