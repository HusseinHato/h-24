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
            'name' => 'manajemen',
            'is_manajemen' => true,
            'email' => 'manajemen@manajemen.com',
            'password' => bcrypt('manajemen'),
            'notelp_pegawai' => '081123456789',
            'status_pegawai' => true
        ]);
        User::create([
            'name' => 'pegawai',
            'is_manajemen' => false,
            'email' => 'pegawai@pegawai.com',
            'password' => bcrypt('pegawai'),
            'notelp_pegawai' => '081987654321',
            'status_pegawai' => true
        ]);
    }
}
