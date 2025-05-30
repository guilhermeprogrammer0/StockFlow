<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Movimentacao extends Model
{
    protected $fillable = ['tipo','quantidade','data','product_id','fornecedor_id'];
    protected $table = 'movimentacoes';
    public function users(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function produto(){
        return $this->belongsTo(Product::class,'product_id');
    }
    public function fornecedor(){
        return $this->belongsTo(Fornecedor::class);
    }
    public function cliente(){
        return $this->belongsTo(Cliente::class);
    }
}
