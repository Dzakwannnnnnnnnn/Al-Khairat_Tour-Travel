<?php

namespace Tests\Feature\Admin;

use App\Models\User;
use App\Models\SavingsPlan;
use App\Models\SavingsDeposit;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SavingsManagementTest extends TestCase
{
    use RefreshDatabase;

    private User $admin;

    protected function setUp(): void
    {
        parent::setUp();
        $this->admin = User::factory()->admin()->create();
    }

    public function test_admin_can_view_savings_list(): void
    {
        $response = $this->actingAs($this->admin)->get(route('admin.savings.index'));
        $response->assertStatus(200);
    }

    public function test_admin_can_add_deposit(): void
    {
        $plan = SavingsPlan::factory()->create(['target_amount' => 35000000]);

        $response = $this->actingAs($this->admin)->post(route('admin.savings.deposit'), [
            'savings_plan_id' => $plan->id,
            'amount' => 2000000,
            'note' => 'Setoran bulan April',
        ]);
        $response->assertRedirect();
        $this->assertDatabaseHas('savings_deposits', [
            'savings_plan_id' => $plan->id,
            'amount' => 2000000,
            'status' => 'approved',
        ]);
    }

    public function test_deposit_cannot_exceed_remaining_target(): void
    {
        $plan = SavingsPlan::factory()->create(['target_amount' => 5000000]);
        SavingsDeposit::factory()->create([
            'savings_plan_id' => $plan->id, 'amount' => 4000000, 'status' => 'approved',
        ]);

        $response = $this->actingAs($this->admin)->post(route('admin.savings.deposit'), [
            'savings_plan_id' => $plan->id,
            'amount' => 2000000, // Only 1M remaining
        ]);
        $response->assertRedirect();
        $response->assertSessionHas('error');
    }

    public function test_admin_can_approve_refund(): void
    {
        $plan = SavingsPlan::factory()->refundRequested()->create();

        $response = $this->actingAs($this->admin)->post(route('admin.savings.approve_refund', $plan->id));
        $response->assertRedirect();
        $this->assertEquals('refunded', $plan->fresh()->status);
    }

    public function test_approve_refund_fails_if_not_requested(): void
    {
        $plan = SavingsPlan::factory()->create(['status' => 'active']);

        $response = $this->actingAs($this->admin)->post(route('admin.savings.approve_refund', $plan->id));
        $response->assertRedirect();
        $response->assertSessionHas('error');
    }

    public function test_admin_can_reject_refund(): void
    {
        $plan = SavingsPlan::factory()->refundRequested()->create();

        $response = $this->actingAs($this->admin)->post(route('admin.savings.process_cancellation', $plan->id), [
            'action' => 'reject',
            'note' => 'Silakan pertimbangkan kembali',
        ]);
        $response->assertRedirect();
        $this->assertEquals('active', $plan->fresh()->status);
        $this->assertNotNull($plan->fresh()->refund_rejection_note);
    }

    public function test_admin_can_delete_savings_plan(): void
    {
        $plan = SavingsPlan::factory()->create();
        SavingsDeposit::factory()->create(['savings_plan_id' => $plan->id]);

        $response = $this->actingAs($this->admin)->post(route('admin.savings.process_cancellation', $plan->id), [
            'action' => 'delete',
        ]);
        $response->assertRedirect();
        $this->assertDatabaseMissing('savings_plans', ['id' => $plan->id]);
        $this->assertDatabaseMissing('savings_deposits', ['savings_plan_id' => $plan->id]);
    }

    public function test_admin_can_view_trash(): void
    {
        SavingsPlan::factory()->refunded()->create();
        $response = $this->actingAs($this->admin)->get(route('admin.savings.trash'));
        $response->assertStatus(200);
    }

    public function test_admin_can_empty_trash(): void
    {
        $plan = SavingsPlan::factory()->refunded()->create();
        SavingsDeposit::factory()->create(['savings_plan_id' => $plan->id]);

        $response = $this->actingAs($this->admin)->post(route('admin.savings.empty_trash'));
        $response->assertRedirect();
        $this->assertDatabaseMissing('savings_plans', ['status' => 'refunded']);
    }
}
