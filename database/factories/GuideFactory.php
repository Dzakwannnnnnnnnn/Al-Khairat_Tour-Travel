<?php

namespace Database\Factories;

use App\Models\Guide;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Guide>
 */
class GuideFactory extends Factory
{
    protected $model = Guide::class;

    public function definition(): array
    {
        return [
            'category' => fake()->randomElement(['umrah', 'haji']),
            'slug' => fake()->unique()->slug(2),
            'title' => 'Panduan ' . fake()->words(3, true),
            'badge' => 'Panduan',
            'icon' => '📖',
            'description' => fake()->sentence(),
            'overview' => fake()->paragraph(),
            'key_points' => ['Point 1', 'Point 2'],
            'sections' => [['title' => 'Section 1', 'content' => 'Content 1']],
            'tips' => ['Tip 1', 'Tip 2'],
            'is_active' => true,
            'order' => null,
        ];
    }

    public function inactive(): static
    {
        return $this->state(fn (array $attributes) => [
            'is_active' => false,
        ]);
    }
}
