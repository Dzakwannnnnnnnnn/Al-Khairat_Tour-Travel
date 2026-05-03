<?php

namespace Database\Factories;

use App\Models\SavingsDeposit;
use App\Models\SavingsPlan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<SavingsDeposit>
 */
class SavingsDepositFactory extends Factory
{
    protected $model = SavingsDeposit::class;

    public function definition(): array
    {
        return [
            'savings_plan_id' => SavingsPlan::factory(),
            'amount' => fake()->randomElement([500000, 1000000, 2000000]),
            'proof_path' => null,
            'status' => 'approved',
            'note' => null,
        ];
    }

    public function pending(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'pending',
        ]);
    }
}
