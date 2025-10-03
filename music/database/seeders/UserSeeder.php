<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;             
use Illuminate\Support\Facades\Hash; 

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Ayaah',
            'email' => 'ayaah1@example.com',
            'password' => Hash::make('123456'),
        ]);
    }
}
