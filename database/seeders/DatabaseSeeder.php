<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create Admin User
        User::create([
            'name' => 'Admin Al-Khairat',
            'email' => 'admin@alkhairat.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        // Create Sample User
        User::create([
            'name' => 'Budi Santoso',
            'email' => 'budi@example.com',
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);

        User::create([
            'name' => 'Siti Nurhaliza',
            'email' => 'siti@example.com',
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);

        // Create Sample Paket Umroh
        Product::create([
            'name' => 'Paket Standar Madinah-Makkah',
            'category' => 'Standar',
            'price' => 25000000,
            'duration' => '9 Hari',
            'description' => 'Paket umroh standar dengan fasilitas lengkap dan nyaman.',
            'features' => ['Penerbangan dari Jakarta', 'Hotel bintang 4 dekat Masjid', 'Visa dan asuransi', 'Makan 3x sehari'],
            'stock' => 30,
            'status' => 'active',
        ]);

        Product::create([
            'name' => 'Paket Premium Exclusive',
            'category' => 'Premium',
            'price' => 45000000,
            'duration' => '14 Hari',
            'description' => 'Paket premium dengan fasilitas VIP dan tour tambahan.',
            'features' => ['Pesawat premium tanpa transit', 'Hotel bintang 5 luxury', 'Visa, asuransi + tour tambahan', 'Private guide berbahasa Indonesia'],
            'stock' => 15,
            'status' => 'active',
        ]);

        Product::create([
            'name' => 'Paket Ekonomis Hemat',
            'category' => 'Ekonomis',
            'price' => 18000000,
            'duration' => '7 Hari',
            'description' => 'Paket umroh hemat untuk budget terbatas.',
            'features' => ['Penerbangan dengan transit', 'Hotel bintang 3-4', 'Visa dan asuransi', 'Makan dan guide'],
            'stock' => 45,
            'status' => 'active',
        ]);

        Product::create([
            'name' => 'Paket Ramadhan Special',
            'category' => 'Premium',
            'price' => 55000000,
            'duration' => '12 Hari',
            'description' => 'Paket spesial Ramadhan dengan ibadah istimewa.',
            'features' => ['Pesawat langsung', 'Hotel bintang 5 view Masjid', 'Sahur & Iftar di Masjidil Haram', 'Guide 24 Jam'],
            'stock' => 10,
            'status' => 'active',
        ]);
    }
}
