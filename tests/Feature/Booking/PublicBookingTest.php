<?php

namespace Tests\Feature\Booking;

use App\Models\User;
use App\Models\Product;
use App\Models\Booking;
use App\Models\Payment;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PublicBookingTest extends TestCase
{
    use RefreshDatabase;

    private User $user;
    private Product $product;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
        $this->product = Product::factory()->create(['price' => 30000000, 'stock' => 20]);
    }

    public function test_user_can_book_single_pilgrim(): void
    {
        $response = $this->actingAs($this->user)->post(route('bookings.public'), [
            'product_id' => $this->product->id,
            'full_name' => ['Ahmad Test'],
            'nik' => ['1234567890123456'],
            'birth_place' => ['Jakarta'],
            'birth_date' => ['1990-01-15'],
            'address' => ['Jl. Test No. 1'],
            'room_variant' => ['triple'],
        ]);
        $response->assertRedirect();
        $this->assertDatabaseHas('bookings', ['full_name' => 'Ahmad Test']);
    }

    public function test_user_can_book_multiple_pilgrims(): void
    {
        $response = $this->actingAs($this->user)->post(route('bookings.public'), [
            'product_id' => $this->product->id,
            'full_name' => ['Pilgrim 1', 'Pilgrim 2'],
            'nik' => ['1111111111111111', '2222222222222222'],
            'birth_place' => ['Jakarta', 'Surabaya'],
            'birth_date' => ['1990-01-15', '1985-06-20'],
            'address' => ['Address 1', 'Address 2'],
            'room_variant' => ['triple', 'triple'],
        ]);
        $response->assertRedirect();
        $this->assertEquals(2, Booking::where('user_id', $this->user->id)->count());
    }

    public function test_group_code_is_shared_for_multi_pilgrim(): void
    {
        $this->actingAs($this->user)->post(route('bookings.public'), [
            'product_id' => $this->product->id,
            'full_name' => ['A', 'B'],
            'nik' => ['1111111111111111', '2222222222222222'],
            'birth_place' => ['X', 'Y'],
            'birth_date' => ['1990-01-15', '1985-06-20'],
            'address' => ['Addr 1', 'Addr 2'],
            'room_variant' => ['triple', 'triple'],
        ]);
        $bookings = Booking::where('user_id', $this->user->id)->get();
        $this->assertEquals($bookings[0]->group_code, $bookings[1]->group_code);
    }

    public function test_payment_is_auto_created_for_booking(): void
    {
        $this->actingAs($this->user)->post(route('bookings.public'), [
            'product_id' => $this->product->id,
            'full_name' => ['Test'],
            'nik' => ['1234567890123456'],
            'birth_place' => ['Jakarta'],
            'birth_date' => ['1990-01-15'],
            'address' => ['Test addr'],
            'room_variant' => ['triple'],
        ]);
        $booking = Booking::where('user_id', $this->user->id)->first();
        $this->assertDatabaseHas('payments', ['booking_id' => $booking->id, 'status' => 'pending']);
    }

    public function test_stock_is_decremented_per_booking(): void
    {
        $initialStock = $this->product->stock;
        $this->actingAs($this->user)->post(route('bookings.public'), [
            'product_id' => $this->product->id,
            'full_name' => ['A', 'B', 'C'],
            'nik' => ['1111111111111111', '2222222222222222', '3333333333333333'],
            'birth_place' => ['X', 'Y', 'Z'],
            'birth_date' => ['1990-01-01', '1990-01-01', '1990-01-01'],
            'address' => ['A1', 'A2', 'A3'],
            'room_variant' => ['triple', 'triple', 'triple'],
        ]);
        $this->assertEquals($initialStock - 3, $this->product->fresh()->stock);
    }

    public function test_room_variant_quad_reduces_price(): void
    {
        $this->actingAs($this->user)->post(route('bookings.public'), [
            'product_id' => $this->product->id,
            'full_name' => ['Test Quad'],
            'nik' => ['1234567890123456'],
            'birth_place' => ['Jakarta'],
            'birth_date' => ['1990-01-15'],
            'address' => ['Test'],
            'room_variant' => ['quad'],
        ]);
        $booking = Booking::where('full_name', 'Test Quad')->first();
        $this->assertEquals($this->product->price - 1000000, $booking->total_price);
    }

    public function test_room_variant_double_increases_price(): void
    {
        $this->actingAs($this->user)->post(route('bookings.public'), [
            'product_id' => $this->product->id,
            'full_name' => ['Test Double'],
            'nik' => ['1234567890123456'],
            'birth_place' => ['Jakarta'],
            'birth_date' => ['1990-01-15'],
            'address' => ['Test'],
            'room_variant' => ['double'],
        ]);
        $booking = Booking::where('full_name', 'Test Double')->first();
        $this->assertEquals($this->product->price + 2000000, $booking->total_price);
    }

    public function test_unauthenticated_booking_page_redirects_to_login(): void
    {
        $response = $this->get(route('booking.page', $this->product));
        $response->assertRedirect(route('login'));
    }
}
