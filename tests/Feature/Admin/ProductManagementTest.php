<?php

namespace Tests\Feature\Admin;

use App\Models\User;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class ProductManagementTest extends TestCase
{
    use RefreshDatabase;

    private User $admin;

    protected function setUp(): void
    {
        parent::setUp();
        $this->admin = User::factory()->admin()->create();
    }

    public function test_admin_can_view_products_list(): void
    {
        Product::factory()->count(3)->create();
        $response = $this->actingAs($this->admin)->get(route('products.index'));
        $response->assertStatus(200);
    }

    public function test_admin_can_create_product(): void
    {
        $response = $this->actingAs($this->admin)->post(route('products.store'), [
            'name' => 'Paket Umrah Premium',
            'category' => 'Premium',
            'price' => 45000000,
            'duration' => '12 Hari',
            'description' => 'Paket premium',
            'features' => "Hotel Bintang 5\nPesawat PP",
            'stock' => 30,
            'status' => 'active',
        ]);
        $response->assertRedirect(route('products.index'));
        $this->assertDatabaseHas('products', ['name' => 'Paket Umrah Premium']);
    }

    public function test_features_parsed_from_newlines(): void
    {
        $this->actingAs($this->admin)->post(route('products.store'), [
            'name' => 'Paket Test',
            'category' => 'Standar',
            'price' => 25000000,
            'features' => "A\nB\nC",
            'stock' => 10,
            'status' => 'active',
        ]);
        $product = Product::where('name', 'Paket Test')->first();
        $this->assertCount(3, $product->features);
    }

    public function test_admin_can_update_product(): void
    {
        $product = Product::factory()->create();
        $response = $this->actingAs($this->admin)->put(route('products.update', $product), [
            'name' => 'Updated', 'category' => 'Ekonomis',
            'price' => 20000000, 'stock' => 25, 'status' => 'active',
        ]);
        $response->assertRedirect(route('products.index'));
        $this->assertDatabaseHas('products', ['id' => $product->id, 'name' => 'Updated']);
    }

    public function test_admin_can_delete_product(): void
    {
        $product = Product::factory()->create();
        $response = $this->actingAs($this->admin)->delete(route('products.destroy', $product));
        $response->assertRedirect(route('products.index'));
        $this->assertDatabaseMissing('products', ['id' => $product->id]);
    }

    public function test_product_creation_validates_required(): void
    {
        $response = $this->actingAs($this->admin)->post(route('products.store'), []);
        $response->assertSessionHasErrors(['name', 'category', 'price', 'stock', 'status']);
    }

    public function test_non_admin_cannot_manage_products(): void
    {
        $user = User::factory()->create(['role' => 'user']);
        $response = $this->actingAs($user)->get(route('products.index'));
        $response->assertRedirect(route('home'));
    }
}
