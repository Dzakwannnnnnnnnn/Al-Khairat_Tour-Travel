<?php

namespace Tests\Feature\Admin;

use App\Models\User;
use App\Models\Booking;
use App\Models\Product;
use App\Models\Payment;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BookingManagementTest extends TestCase
{
    use RefreshDatabase;

    private User $admin;
    private Product $product;

    protected function setUp(): void
    {
        parent::setUp();
        $this->admin = User::factory()->admin()->create();
        $this->product = Product::factory()->create(['stock' => 50, 'price' => 35000000]);
    }

    public function test_admin_can_view_bookings(): void
    {
        $response = $this->actingAs($this->admin)->get(route('bookings.index'));
        $response->assertStatus(200);
    }

    public function test_admin_can_create_booking(): void
    {
        $response = $this->actingAs($this->admin)->post(route('bookings.store'), [
            'full_name' => 'Ahmad Test',
            'orderer_email' => 'ahmad@test.com',
            'orderer_phone' => '081234567890',
            'product_id' => $this->product->id,
            'status' => 'pending',
        ]);
        $response->assertRedirect(route('bookings.index'));
        $this->assertDatabaseHas('bookings', ['full_name' => 'Ahmad Test']);
    }

    public function test_booking_auto_creates_payment(): void
    {
        $this->actingAs($this->admin)->post(route('bookings.store'), [
            'full_name' => 'Test Jamaah',
            'product_id' => $this->product->id,
            'status' => 'pending',
        ]);
        $booking = Booking::where('full_name', 'Test Jamaah')->first();
        $this->assertNotNull($booking);
        $this->assertDatabaseHas('payments', ['booking_id' => $booking->id]);
    }

    public function test_booking_decrements_stock(): void
    {
        $initialStock = $this->product->stock;
        $this->actingAs($this->admin)->post(route('bookings.store'), [
            'full_name' => 'Test', 'product_id' => $this->product->id, 'status' => 'pending',
        ]);
        $this->product->refresh();
        $this->assertEquals($initialStock - 1, $this->product->stock);
    }

    public function test_cannot_create_booking_with_fully_paid_status(): void
    {
        $response = $this->actingAs($this->admin)->post(route('bookings.store'), [
            'full_name' => 'Test',
            'product_id' => $this->product->id,
            'status' => 'fully_paid',
        ]);
        $response->assertSessionHasErrors('status');
    }

    public function test_admin_can_update_booking(): void
    {
        $booking = Booking::factory()->create(['product_id' => $this->product->id]);
        $response = $this->actingAs($this->admin)->put(route('bookings.update', $booking), [
            'full_name' => 'Updated Name',
            'product_id' => $this->product->id,
            'status' => 'dp_paid',
        ]);
        $response->assertRedirect(route('bookings.index'));
        $this->assertDatabaseHas('bookings', ['id' => $booking->id, 'full_name' => 'Updated Name']);
    }

    public function test_cancel_booking_increments_stock(): void
    {
        $booking = Booking::factory()->create([
            'product_id' => $this->product->id, 'status' => 'pending', 'booking_seat' => 1,
        ]);
        $stockBefore = $this->product->fresh()->stock;
        $this->actingAs($this->admin)->put(route('bookings.update', $booking), [
            'full_name' => $booking->full_name,
            'product_id' => $this->product->id,
            'status' => 'cancelled',
        ]);
        $this->assertEquals($stockBefore + 1, $this->product->fresh()->stock);
    }

    public function test_admin_can_delete_booking(): void
    {
        $booking = Booking::factory()->create(['product_id' => $this->product->id]);
        Payment::factory()->create(['booking_id' => $booking->id]);

        $response = $this->actingAs($this->admin)->delete(route('bookings.destroy', $booking));
        $response->assertRedirect(route('bookings.index'));
        $this->assertDatabaseMissing('bookings', ['id' => $booking->id]);
        $this->assertDatabaseMissing('payments', ['booking_id' => $booking->id]);
    }

    public function test_delete_booking_returns_stock(): void
    {
        $booking = Booking::factory()->create([
            'product_id' => $this->product->id, 'status' => 'pending', 'booking_seat' => 2,
        ]);
        $stockBefore = $this->product->fresh()->stock;
        $this->actingAs($this->admin)->delete(route('bookings.destroy', $booking));
        $this->assertEquals($stockBefore + 2, $this->product->fresh()->stock);
    }

    public function test_savings_status_creates_savings_plan(): void
    {
        $user = User::factory()->create();
        $booking = Booking::factory()->create([
            'user_id' => $user->id, 'product_id' => $this->product->id, 'status' => 'pending',
        ]);
        $this->actingAs($this->admin)->put(route('bookings.update', $booking), [
            'full_name' => $booking->full_name,
            'product_id' => $this->product->id,
            'status' => 'savings',
        ]);
        $this->assertDatabaseHas('savings_plans', ['booking_id' => $booking->id, 'status' => 'active']);
    }
}
