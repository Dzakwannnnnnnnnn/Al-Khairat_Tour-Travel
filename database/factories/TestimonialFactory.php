<?php

namespace Database\Factories;

use App\Models\Testimonial;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Testimonial>
 */
class TestimonialFactory extends Factory
{
    protected $model = Testimonial::class;

    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->safeEmail(),
            'product_id' => Product::factory(),
            'message' => fake()->paragraph(),
            'video_url' => null,
            'rating' => fake()->numberBetween(3, 5),
            'status' => 'draft',
        ];
    }

    public function published(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'published',
        ]);
    }
}
