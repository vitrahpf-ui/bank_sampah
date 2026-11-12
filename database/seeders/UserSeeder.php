<?php

namespace Database\Seeders;

use App\Models\Nasabah;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // admin
         User::create([
            'name' => 'Administrator',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'admin',
            'no_hp' => '081234567890',
            'alamat' => 'Bogor',
         ]);
        //  petugas

         User::create([
            'name' => 'Petugas',
            'username' => 'petugas',
            'email' => 'petugas@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'petugas',
            'no_hp' => '081234567891',
            'alamat' => 'Bogor',
        ]);
        // nasabah
        $nasabah = User::create([
            'name' => 'Nasabah',
            'username' => 'nasabah',
            'email' => 'nasabah@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'nasabah',
            'no_hp' => '081234567892',
            'alamat' => 'Bogor',
        ]);
        Nasabah::create([
            'user_id' => $nasabah->id,
            'saldo' => 0,
        ]);

    }
}
