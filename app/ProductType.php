<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    protected $fillable = [
        'idCategory', 'name', 'slug','status'
    ];

    public function category() {
        return $this->belongsTo(Category::class,'idCategory','id');
    }
}
