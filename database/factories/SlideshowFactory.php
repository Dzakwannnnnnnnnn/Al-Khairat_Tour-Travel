<?php

namespace Database\Factories;

use App\Models\Slideshow;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Slideshow>
 */
class SlideshowFactory extends Factory
{
    protected $model = Slideshow::class;

    public function definition(): array
    {
        return [
            'title' => fake()->sentence(3),
            'image_url' => fake()->imageUrl(),
            'local_path' => null,
            'order' => null,
            'is_active' => true,
            'description' => fake()->sentence(),
        ];
    }

    public function inactive(): static
    {
        return $this->state(fn (array $attributes) => [
            'is_active' => false,
        ]);
    }
}
