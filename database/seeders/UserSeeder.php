<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name'     => 'Admin Makopala',
            'email'    => 'admin@makopala.org',
            'password' => Hash::make('makopala2025'),
            'about'    => 'Admin utama sistem MAKOPALA yang mengelola seluruh sistem dan pengguna.',
        ]);
    }
}