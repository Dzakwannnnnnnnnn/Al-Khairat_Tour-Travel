<?php

namespace Tests\Feature\Booking;

use App\Models\User;
use App\Models\Booking;
use App\Models\Product;
use App\Models\Payment;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class InvoiceTest extends TestCase
{
    use RefreshDatabase;

    public function test_invoice_is_accessible_by_group_code(): void
    {
        $product = Product::factory()->create();
        $booking = Booking::factory()->create([
            'product_id' => $product->id,
            'group_code' => 'GRP-TEST-0001',
        ]);
        Payment::factory()->create(['booking_id' => $booking->id]);

        $response = $this->get(route('booking.invoice', 'GRP-TEST-0001'));
        $response->assertStatus(200);
    }

    public function test_invoice_returns_404_for_invalid_code(): void
    {
        $response = $this->get(route('booking.invoice', 'INVALID-CODE'));
        $response->assertStatus(404);
    }

    public function test_payment_method_can_be_updated(): void
    {
        $product = Product::factory()->create();
        $booking = Booking::factory()->create([
            'product_id' => $product->id,
            'group_code' => 'GRP-TEST-0002',
        ]);
        Payment::factory()->create(['booking_id' => $booking->id]);

        $response = $this->post(route('booking.payment_method', 'GRP-TEST-0002'), [
            'payment_method' => 'Transfer Bank BSI',
        ]);
        $response->assertRedirect();
    }

    public function test_payment_status_api_returns_correct_status(): void
    {
        $product = Product::factory()->create();
        $booking = Booking::factory()->create([
            'product_id' => $product->id,
            'group_code' => 'GRP-TEST-0003',
        ]);
        Payment::factory()->verified()->create(['booking_id' => $booking->id]);

        $response = $this->get(route('booking.invoice.status', 'GRP-TEST-0003'));
        $response->assertJson(['status' => 'verified']);
    }

    public function test_payment_status_returns_404_for_invalid(): void
    {
        $response = $this->get(route('booking.invoice.status', 'INVALID'));
        $response->assertStatus(404);
    }
}
