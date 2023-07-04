<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
<<<<<<< Updated upstream
=======

        User::create([
            'name'=>'manajemen',
            'is_manajemen' => true,
            'email'=>'manajemen@manajemen.com',
            'password'=>bcrypt('manajemen'),
            'notelp_pegawai' =>'081123456789',
            'status_pegawai' => true
        ]);
        User::create([
            'name'=>'pegawai',
            'is_manajemen' => false,
            'email'=>'pegawai@pegawai.com',
            'password'=>bcrypt('pegawai'),
            'notelp_pegawai' =>'081987654321',
            'status_pegawai' => true
        ]);

>>>>>>> Stashed changes
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
