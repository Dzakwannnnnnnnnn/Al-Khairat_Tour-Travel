<?php

namespace Database\Factories;

use App\Models\SavingsPlan;
use App\Models\User;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<SavingsPlan>
 */
class SavingsPlanFactory extends Factory
{
    protected $model = SavingsPlan::class;

    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'product_id' => Product::factory(),
            'booking_id' => null,
            'quantity' => 1,
            'target_amount' => 35000000,
            'monthly_target' => 2000000,
            'status' => 'active',
            'refund_note' => null,
            'refund_bank_name' => null,
            'refund_bank_account' => null,
            'refund_rejection_note' => null,
            'refund_requested_at' => null,
        ];
    }

    public function refundRequested(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'refund_requested',
            'refund_note' => 'Saya ingin membatalkan',
            'refund_bank_name' => 'BSI',
            'refund_bank_account' => '1234567890',
            'refund_requested_at' => now(),
        ]);
    }

    public function refunded(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'refunded',
        ]);
    }

    public function cancelled(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'cancelled',
        ]);
    }
}
