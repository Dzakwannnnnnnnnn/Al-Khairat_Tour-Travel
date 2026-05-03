<?php

namespace Tests\Unit\Models;

use App\Models\Product;
use App\Models\Booking;
use App\Models\SavingsPlan;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductModelTest extends TestCase
{
    use RefreshDatabase;

    public function test_features_is_cast_to_array(): void
    {
        $product = Product::factory()->create([
            'features' => ['Hotel Bintang 5', 'Pesawat PP'],
        ]);

        $this->assertIsArray($product->features);
        $this->assertCount(2, $product->features);
    }

    public function test_rundown_is_cast_to_array(): void
    {
        $product = Product::factory()->create([
            'rundown' => [['day' => 'Hari 1', 'activities' => 'Berangkat']],
        ]);

        $this->assertIsArray($product->rundown);
    }

    public function test_price_is_cast_to_decimal(): void
    {
        $product = Product::factory()->create(['price' => 35000000]);
        $this->assertIsString($product->price); // decimal:2 cast returns string
    }

    public function test_product_has_bookings_relationship(): void
    {
        $product = Product::factory()->create();
        $this->assertInstanceOf(\Illuminate\Database\Eloquent\Relations\HasMany::class, $product->bookings());
    }

    public function test_product_has_savings_plans_relationship(): void
    {
        $product = Product::factory()->create();
        $this->assertInstanceOf(\Illuminate\Database\Eloquent\Relations\HasMany::class, $product->savingsPlans());
    }

    public function test_departure_date_is_cast_to_date(): void
    {
        $product = Product::factory()->create([
            'departure_date' => '2026-06-15',
        ]);

        $this->assertInstanceOf(\Illuminate\Support\Carbon::class, $product->departure_date);
    }
}
