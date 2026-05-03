<?php

namespace Tests\Unit\Models;

use App\Models\SavingsPlan;
use App\Models\SavingsDeposit;
use App\Models\User;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SavingsPlanModelTest extends TestCase
{
    use RefreshDatabase;

    public function test_current_balance_sums_only_approved_deposits(): void
    {
        $plan = SavingsPlan::factory()->create();
        
        SavingsDeposit::factory()->create([
            'savings_plan_id' => $plan->id,
            'amount' => 1000000,
            'status' => 'approved',
        ]);
        SavingsDeposit::factory()->create([
            'savings_plan_id' => $plan->id,
            'amount' => 500000,
            'status' => 'approved',
        ]);
        SavingsDeposit::factory()->create([
            'savings_plan_id' => $plan->id,
            'amount' => 2000000,
            'status' => 'pending',
        ]);

        $this->assertEquals(1500000, $plan->currentBalance());
    }

    public function test_current_balance_returns_zero_when_no_deposits(): void
    {
        $plan = SavingsPlan::factory()->create();
        $this->assertEquals(0, $plan->currentBalance());
    }

    public function test_progress_percentage_normal_case(): void
    {
        $plan = SavingsPlan::factory()->create(['target_amount' => 10000000]);
        SavingsDeposit::factory()->create([
            'savings_plan_id' => $plan->id,
            'amount' => 2500000,
            'status' => 'approved',
        ]);

        $this->assertEquals(25, $plan->progressPercentage());
    }

    public function test_progress_percentage_capped_at_100(): void
    {
        $plan = SavingsPlan::factory()->create(['target_amount' => 1000000]);
        SavingsDeposit::factory()->create([
            'savings_plan_id' => $plan->id,
            'amount' => 2000000,
            'status' => 'approved',
        ]);

        $this->assertEquals(100, $plan->progressPercentage());
    }

    public function test_progress_percentage_returns_zero_when_target_is_zero(): void
    {
        $plan = SavingsPlan::factory()->create(['target_amount' => 0]);
        $this->assertEquals(0, $plan->progressPercentage());
    }

    public function test_estimated_months_calculation(): void
    {
        $plan = SavingsPlan::factory()->create([
            'target_amount' => 35000000,
            'monthly_target' => 2000000,
        ]);

        // ceil(35000000 / 2000000) = 18
        $this->assertEquals(18, $plan->estimatedMonths());
    }

    public function test_estimated_months_returns_zero_when_monthly_target_is_zero(): void
    {
        $plan = SavingsPlan::factory()->create(['monthly_target' => 0]);
        $this->assertEquals(0, $plan->estimatedMonths());
    }

    public function test_remaining_months_calculation(): void
    {
        $plan = SavingsPlan::factory()->create([
            'target_amount' => 10000000,
            'monthly_target' => 2000000,
        ]);
        SavingsDeposit::factory()->create([
            'savings_plan_id' => $plan->id,
            'amount' => 4000000,
            'status' => 'approved',
        ]);

        // remaining = 10000000 - 4000000 = 6000000, ceil(6000000/2000000) = 3
        $this->assertEquals(3, $plan->remainingMonths());
    }

    public function test_remaining_months_returns_zero_when_fully_funded(): void
    {
        $plan = SavingsPlan::factory()->create([
            'target_amount' => 5000000,
            'monthly_target' => 1000000,
        ]);
        SavingsDeposit::factory()->create([
            'savings_plan_id' => $plan->id,
            'amount' => 5000000,
            'status' => 'approved',
        ]);

        $this->assertEquals(0, $plan->remainingMonths());
    }

    public function test_remaining_months_returns_zero_when_monthly_target_is_zero(): void
    {
        $plan = SavingsPlan::factory()->create(['monthly_target' => 0]);
        $this->assertEquals(0, $plan->remainingMonths());
    }

    public function test_savings_plan_has_user_relationship(): void
    {
        $plan = SavingsPlan::factory()->create();
        $this->assertInstanceOf(User::class, $plan->user);
    }

    public function test_savings_plan_has_product_relationship(): void
    {
        $plan = SavingsPlan::factory()->create();
        $this->assertInstanceOf(Product::class, $plan->product);
    }

    public function test_savings_plan_has_deposits_relationship(): void
    {
        $plan = SavingsPlan::factory()->create();
        $this->assertInstanceOf(\Illuminate\Database\Eloquent\Relations\HasMany::class, $plan->deposits());
    }
}
