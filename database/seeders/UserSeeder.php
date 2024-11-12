<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create([
            'name' => 'Kevyn Elmer Chacon Huaranga',
            'email' => 'prueba@gmail.com',
            'password' => '12345678',
            'users_id' => 1,
            'status' => 1,
         ]);
    }
}
