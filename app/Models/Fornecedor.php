<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
    protected $table = 'fornecedores';
    public function movimentacao(){
        return $this->hasMany(Movimentacao::class);
    }
}
