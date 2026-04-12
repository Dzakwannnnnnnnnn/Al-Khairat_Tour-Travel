<?php

namespace Database\Seeders;

use App\Models\Guide;
use Illuminate\Database\Seeder;

class GuideSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $panduan = config('panduan');

        foreach ($panduan as $category => $guides) {
            foreach ($guides as $slug => $guideData) {
                // Map the structure from config to database fields
                $key_points = [];
                if (isset($guideData['keyPoints'])) {
                    // Convert keyPoints to JSON format
                    $key_points = $guideData['keyPoints'];
                } elseif (isset($guideData['sections'])) {
                    // For guides without keyPoints, skip
                }

                // Convert sections to proper format
                $sections = isset($guideData['sections']) ? $guideData['sections'] : [];

                // Convert tips to simple array
                $tips = isset($guideData['tips']) ? $guideData['tips'] : [];

                // Determine order based on slug
                $order = match($slug) {
                    'dokumen' => 1,
                    'checklist' => 2,
                    'tata-cara' => 3,
                    'faq' => 4,
                    'doa' => 5,
                    'tips' => 6,
                    default => 7,
                };

                // Create or update the guide
                Guide::updateOrCreate(
                    [
                        'category' => $category,
                        'slug' => $slug,
                    ],
                    [
                        'title' => $guideData['title'] ?? '',
                        'badge' => $guideData['badge'] ?? '',
                        'icon' => $guideData['icon'] ?? '',
                        'description' => $guideData['description'] ?? '',
                        'overview' => $guideData['overview'] ?? '',
                        'key_points' => !empty($key_points) ? json_encode($key_points) : null,
                        'sections' => !empty($sections) ? json_encode($sections) : null,
                        'tips' => !empty($tips) ? json_encode($tips) : null,
                        'is_active' => true,
                        'order' => $order,
                    ]
                );

                $this->command->info("✓ Created/Updated: {$category} - {$slug}");
            }
        }

        $this->command->info("\n✓ All guides have been seeded successfully!");
    }
}
