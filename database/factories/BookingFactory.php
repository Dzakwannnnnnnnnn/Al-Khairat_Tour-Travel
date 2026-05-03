<?php

namespace Database\Factories;

use App\Models\Booking;
use App\Models\User;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Booking>
 */
class BookingFactory extends Factory
{
    protected $model = Booking::class;

    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'product_id' => Product::factory(),
            'booking_code' => 'BKG-' . date('Ymd') . '-' . strtoupper(Str::random(4)),
            'group_code' => 'GRP-' . date('Ymd') . '-' . strtoupper(Str::random(4)),
            'booking_seat' => 1,
            'total_price' => 35000000,
            'status' => 'pending',
            'full_name' => fake()->name(),
            'nik' => fake()->numerify('################'),
            'birth_place' => fake()->city(),
            'birth_date' => fake()->date(),
            'address' => fake()->address(),
            'room_variant' => 'triple',
            'orderer_phone' => '08' . fake()->numerify('##########'),
            'orderer_email' => fake()->safeEmail(),
            'voucher_code' => null,
            'notes' => null,
        ];
    }

    public function savings(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'savings',
        ]);
    }

    public function cancelled(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'cancelled',
        ]);
    }

    public function fullyPaid(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'fully_paid',
        ]);
    }
}
