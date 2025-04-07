<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    public function produto(){
        return $this->hasMany(Product::class);
    }
}
