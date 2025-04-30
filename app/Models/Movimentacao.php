<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Movimentacao extends Model
{
    protected $fillable = ['tipo','quantidade','data','product_id'];
    protected $table = 'movimentacoes';
    public function produto(){
        return $this->belongsTo(Product::class,'product_id');
    }
}
