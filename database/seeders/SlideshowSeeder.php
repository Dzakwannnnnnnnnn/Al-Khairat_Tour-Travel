<?php

namespace Database\Seeders;

use App\Models\Slideshow;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SlideshowSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $slideshows = [
            [
                'title' => 'Destinasi Indah',
                'image_url' => 'https://images.unsplash.com/photo-1564769666747-d4b842b2b4d5?w=1200&h=800&fit=crop',
                'description' => 'Jelajahi keindahan destinasi spiritual dengan pemandu berpengalaman',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'Pelayanan Terbaik',
                'image_url' => 'https://images.unsplash.com/photo-1505142468610-359e7d316be0?w=1200&h=800&fit=crop',
                'description' => 'Layanan pelanggan yang responsif dan profesional',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'Pengalaman Spiritual',
                'image_url' => 'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=1200&h=800&fit=crop',
                'description' => 'Wujudkan pengalaman ibadah yang tak terlupakan',
                'order' => 3,
                'is_active' => true,
            ],
            [
                'title' => 'Paket Terjangkau',
                'image_url' => 'https://images.unsplash.com/photo-1469854523086-cc02fe5d8800?w=1200&h=800&fit=crop',
                'description' => 'Paket umrah dan haji dengan harga yang kompetitif',
                'order' => 4,
                'is_active' => true,
            ],
        ];

        foreach ($slideshows as $slideshow) {
            Slideshow::firstOrCreate(
                ['title' => $slideshow['title']],
                $slideshow
            );
        }
    }
}
