<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    public function movimentacao(){
        return $this->hasMany(Movimentacao::class);
    }
}
