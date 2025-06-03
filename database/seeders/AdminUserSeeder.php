<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User; // Import model User
use Illuminate\Support\Facades\Hash; // Import Hash facade
use Illuminate\Support\Str; // Import Str facade jika perlu untuk string acak

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Buat user admin
        User::create([
            'name' => 'Admin Utama', // Ganti dengan nama admin yang Anda inginkan
            'email' => 'admin@example.com', // Ganti dengan email admin yang Anda inginkan
            'password' => Hash::make('password'), // Ganti 'password' dengan password yang kuat
            'role' => 'admin', // Tetapkan peran sebagai 'admin'
            'email_verified_at' => now(), // Set email terverifikasi agar bisa login admin panel
            'remember_token' => Str::random(10), // Token acak
        ]);

        // Anda bisa tambahkan user default lain jika perlu, contoh:
        // User::create([
        //     'name' => 'Pengguna Biasa',
        //     'email' => 'user@example.com',
        //     'password' => Hash::make('password'),
        //     'role' => 'user',
        //     'email_verified_at' => now(),
        //     'remember_token' => Str::random(10),
        // ]);
    }
}