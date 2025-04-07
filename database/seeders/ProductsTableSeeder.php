<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 5; $i++) {
            DB::table('products')->insert([
                'nome' =>  "Produto$i",
                'descricao' => "Decricao$i", 
                'preco' =>   $i *25,
                'quantidade' => $i*2, 
                'categoria_id' => $i, 
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
