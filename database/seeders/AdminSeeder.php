<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        Admin::create([
            'nama_admin' => 'Gio',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345'),
            'role' => 'Super Admin',
            'status' => 'Aktif',
        ]);

         Admin::create([
            'nama_admin' => 'Rasya',
            'email' => 'administrator@gmail.com',
            'password' => Hash::make('rasya123'),
            'role' => 'Admin',
            'status' => 'Aktif',
        ]);
    }
}