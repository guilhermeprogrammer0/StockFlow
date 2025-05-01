<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['nome', 'codigo', 'preco', 'quantidade', 'categoria_id'];
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
    public function movimentacao(){
        return $this->hasMany(Movimentacao::class);
    }
}
