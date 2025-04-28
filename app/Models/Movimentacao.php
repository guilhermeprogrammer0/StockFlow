<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movimentacao extends Model
{
    protected $fillable = ['tipo','quantidade','product_id'];
    protected $table = 'movimentacoes';
    public function produto(){
        return $this->belongsTo(Product::class,'product_id');
    }
}
