<?php

namespace Database\Seeders;
use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::create([
            'role_id'=>'1',
            'name'=>'manajemen',
            'email'=>'manajemen@manajemen.com',
            'password'=>bcrypt('manajemen'),
        ]);
        User::create([
            'role_id'=>'2',
            'name'=>'pegawai',
            'email'=>'pegawai@pegawai.com',
            'password'=>bcrypt('pegawai'),
        ]);
        
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}