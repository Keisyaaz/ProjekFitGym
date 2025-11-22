<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        // Jalankan seeder produk + admin
        $this->call([
            ProductSeeder::class,
            AdminSeeder::class, // ← Tambahkan ini
        ]);
        

        
    }
}
