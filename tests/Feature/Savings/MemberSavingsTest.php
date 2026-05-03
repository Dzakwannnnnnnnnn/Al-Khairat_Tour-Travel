<?php

namespace Tests\Feature\Savings;

use App\Models\User;
use App\Models\Product;
use App\Models\SavingsPlan;
use App\Models\SavingsDeposit;
use App\Models\Setting;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MemberSavingsTest extends TestCase
{
    use RefreshDatabase;

    private User $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
    }

    public function test_member_can_view_savings_page(): void
    {
        $response = $this->actingAs($this->user)->get(route('member.savings'));
        $response->assertStatus(200);
    }

    public function test_member_can_create_savings_plan(): void
    {
        $product = Product::factory()->create(['price' => 35000000]);

        $response = $this->actingAs($this->user)->post(route('member.savings.store'), [
            'product_id' => $product->id,
            'quantity' => 2,
            'monthly_target' => 2000000,
        ]);
        $response->assertRedirect();
        $this->assertDatabaseHas('savings_plans', [
            'user_id' => $this->user->id,
            'target_amount' => 70000000, // 35M * 2
            'monthly_target' => 2000000,
            'status' => 'active',
        ]);
    }

    public function test_member_can_request_refund(): void
    {
        $plan = SavingsPlan::factory()->create([
            'user_id' => $this->user->id,
            'status' => 'active',
        ]);

        $response = $this->actingAs($this->user)->post(
            route('member.savings.request_refund', $plan->id),
            [
                'note' => 'Saya perlu dana untuk keperluan lain',
                'refund_bank_name' => 'BSI',
                'refund_bank_account' => '1234567890',
            ]
        );
        $response->assertRedirect();
        $this->assertEquals('refund_requested', $plan->fresh()->status);
    }

    public function test_member_cannot_request_refund_for_non_active_plan(): void
    {
        $plan = SavingsPlan::factory()->create([
            'user_id' => $this->user->id,
            'status' => 'refunded',
        ]);

        $response = $this->actingAs($this->user)->post(
            route('member.savings.request_refund', $plan->id),
            ['note' => 'Test', 'refund_bank_name' => 'BSI', 'refund_bank_account' => '123']
        );
        $response->assertRedirect();
        $response->assertSessionHas('error');
    }

    public function test_member_cannot_request_refund_for_others_plan(): void
    {
        $otherUser = User::factory()->create();
        $plan = SavingsPlan::factory()->create([
            'user_id' => $otherUser->id,
            'status' => 'active',
        ]);

        $response = $this->actingAs($this->user)->post(
            route('member.savings.request_refund', $plan->id),
            ['note' => 'Test', 'refund_bank_name' => 'BSI', 'refund_bank_account' => '123']
        );
        $response->assertStatus(404);
    }

    public function test_refund_request_validates_bank_details(): void
    {
        $plan = SavingsPlan::factory()->create([
            'user_id' => $this->user->id,
            'status' => 'active',
        ]);

        $response = $this->actingAs($this->user)->post(
            route('member.savings.request_refund', $plan->id),
            ['note' => 'Test']
        );
        $response->assertSessionHasErrors(['refund_bank_name', 'refund_bank_account']);
    }

    public function test_savings_plan_validates_minimum_monthly_target(): void
    {
        $product = Product::factory()->create();

        $response = $this->actingAs($this->user)->post(route('member.savings.store'), [
            'product_id' => $product->id,
            'quantity' => 1,
            'monthly_target' => 50000, // Below 100000 minimum
        ]);
        $response->assertSessionHasErrors('monthly_target');
    }
}
