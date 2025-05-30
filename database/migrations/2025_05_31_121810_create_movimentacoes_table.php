<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('movimentacoes', function (Blueprint $table) {
            $table->id();
            $table->enum('tipo', ['entrada', 'saida']); 
            $table->integer('quantidade'); 
            $table->dateTime('data');    
            $table->unsignedBigInteger('user_id')->nullable(); 
            $table->unsignedBigInteger('product_id')->nullable(); 
            $table->unsignedBigInteger('fornecedor_id')->nullable();     
            $table->unsignedBigInteger('cliente_id')->nullable();        
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('restrict');
            $table->foreign('fornecedor_id')->references('id')->on('fornecedores')->onDelete('restrict');
            $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movimentacoes');
    }
};
