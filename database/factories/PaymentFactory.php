<?php

namespace Database\Factories;

use App\Models\Payment;
use App\Models\Booking;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Payment>
 */
class PaymentFactory extends Factory
{
    protected $model = Payment::class;

    public function definition(): array
    {
        return [
            'booking_id' => Booking::factory(),
            'user_id' => null,
            'amount' => 35000000,
            'payment_method' => 'Transfer Bank BSI',
            'payment_date' => now(),
            'status' => 'pending',
            'proof_image' => null,
        ];
    }

    public function verified(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'verified',
        ]);
    }

    public function rejected(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'rejected',
        ]);
    }
}
