<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Database\Seeders\AdminUserSeeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Seeder harga pemeriksaan
        $this->call([
            PemeriksaanHargaSeeder::class,
            AdminUserSeeder::class,
        ]);

        // Seeder user dummy
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('password'), // pastikan di-hash!
        ]);
    }
}