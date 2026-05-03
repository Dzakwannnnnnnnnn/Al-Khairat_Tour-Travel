<?php

namespace Tests\Feature\Admin;

use App\Models\User;
use App\Models\Booking;
use App\Models\Product;
use App\Models\Payment;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PaymentManagementTest extends TestCase
{
    use RefreshDatabase;

    private User $admin;

    protected function setUp(): void
    {
        parent::setUp();
        $this->admin = User::factory()->admin()->create();
    }

    public function test_admin_can_view_payments(): void
    {
        $response = $this->actingAs($this->admin)->get(route('payments.index'));
        $response->assertStatus(200);
    }

    public function test_admin_can_create_payment(): void
    {
        $product = Product::factory()->create();
        $booking = Booking::factory()->create(['product_id' => $product->id]);

        $response = $this->actingAs($this->admin)->post(route('payments.store'), [
            'booking_id' => $booking->id,
            'amount' => 5000000,
            'payment_method' => 'Transfer BSI',
            'payment_date' => now()->toDateString(),
            'status' => 'pending',
        ]);
        $response->assertRedirect(route('payments.index'));
        $this->assertDatabaseHas('payments', ['booking_id' => $booking->id, 'amount' => 5000000]);
    }

    public function test_verified_payment_syncs_booking_to_fully_paid(): void
    {
        $product = Product::factory()->create();
        $booking = Booking::factory()->create(['product_id' => $product->id, 'status' => 'pending']);
        $payment = Payment::factory()->create(['booking_id' => $booking->id]);

        $this->actingAs($this->admin)->put(route('payments.update', $payment), [
            'booking_id' => $booking->id,
            'amount' => 35000000,
            'payment_method' => 'Transfer BSI',
            'payment_date' => now()->toDateString(),
            'status' => 'verified',
        ]);
        $this->assertEquals('fully_paid', $booking->fresh()->status);
    }

    public function test_rejected_payment_syncs_booking_to_pending(): void
    {
        $product = Product::factory()->create();
        $booking = Booking::factory()->create(['product_id' => $product->id, 'status' => 'fully_paid']);
        $payment = Payment::factory()->verified()->create(['booking_id' => $booking->id]);

        $this->actingAs($this->admin)->put(route('payments.update', $payment), [
            'booking_id' => $booking->id,
            'amount' => 35000000,
            'payment_method' => 'Transfer BSI',
            'payment_date' => now()->toDateString(),
            'status' => 'rejected',
        ]);
        $this->assertEquals('pending', $booking->fresh()->status);
    }

    public function test_cannot_verify_payment_without_valid_method(): void
    {
        $product = Product::factory()->create();
        $booking = Booking::factory()->create(['product_id' => $product->id]);

        $response = $this->actingAs($this->admin)->post(route('payments.store'), [
            'booking_id' => $booking->id,
            'amount' => 5000000,
            'payment_method' => 'Belum Memilih',
            'payment_date' => now()->toDateString(),
            'status' => 'verified',
        ]);
        $response->assertSessionHasErrors('payment_method');
    }

    public function test_admin_can_delete_payment(): void
    {
        $product = Product::factory()->create();
        $booking = Booking::factory()->create(['product_id' => $product->id]);
        $payment = Payment::factory()->create(['booking_id' => $booking->id]);

        $response = $this->actingAs($this->admin)->delete(route('payments.destroy', $payment));
        $response->assertRedirect(route('payments.index'));
        $this->assertDatabaseMissing('payments', ['id' => $payment->id]);
    }
}
