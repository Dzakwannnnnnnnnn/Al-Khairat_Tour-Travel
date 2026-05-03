<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Product>
 */
class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition(): array
    {
        return [
            'name' => 'Paket Umrah ' . fake()->word(),
            'category' => fake()->randomElement(['Standar', 'Premium', 'Ekonomis']),
            'price' => fake()->randomElement([25000000, 35000000, 45000000]),
            'price_quad' => null,
            'price_triple' => null,
            'price_double' => null,
            'duration' => '9 Hari',
            'departure_date' => fake()->dateTimeBetween('+1 month', '+6 months'),
            'description' => fake()->paragraph(),
            'features' => ['Hotel Bintang 5', 'Pesawat PP', 'Makan 3x Sehari'],
            'rundown' => null,
            'stock' => fake()->numberBetween(10, 50),
            'status' => 'active',
            'image' => null,
            'guide_phone' => '08' . fake()->numerify('##########'),
        ];
    }

    public function inactive(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'inactive',
        ]);
    }
}
