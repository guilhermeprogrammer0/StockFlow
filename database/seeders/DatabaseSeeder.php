<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        DB::table('users')->insert([
            'name' => 'Administrador',
            'email' => 'adm@gmail.com',
            'role' => 'administrador',
            'password' => bcrypt('Administrador00'),
            'email_verified_at' => now(),
        ]);
    }
}
