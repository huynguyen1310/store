<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $guard = [];

    public function User() {
        return $this->belongsTo(User::class,'idUser','id');
    }
}
