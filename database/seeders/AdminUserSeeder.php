<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        DB::table('users')->insert([
            'name' => 'Dosen 1',
            'email' => 'dosen1@gmail.com',
            'password' => Hash::make('dosen123'), // Gunakan password aman!
            'role' => 'dosen',
            'npm' => null, // Isi nilai NULL untuk npm
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
    }
    
}
