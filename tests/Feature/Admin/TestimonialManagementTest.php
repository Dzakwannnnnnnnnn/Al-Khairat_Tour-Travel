<?php

namespace Tests\Feature\Admin;

use App\Models\User;
use App\Models\Product;
use App\Models\Testimonial;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TestimonialManagementTest extends TestCase
{
    use RefreshDatabase;

    private User $admin;

    protected function setUp(): void
    {
        parent::setUp();
        $this->admin = User::factory()->admin()->create();
    }

    public function test_admin_can_view_testimonials(): void
    {
        $response = $this->actingAs($this->admin)->get(route('testimonials.index'));
        $response->assertStatus(200);
    }

    public function test_admin_can_create_testimonial(): void
    {
        $product = Product::factory()->create();
        $response = $this->actingAs($this->admin)->post(route('testimonials.store'), [
            'name' => 'Jamaah Test',
            'email' => 'jamaah@test.com',
            'product_id' => $product->id,
            'message' => 'Pelayanan sangat memuaskan!',
            'rating' => 5,
            'status' => 'published',
        ]);
        $response->assertRedirect(route('testimonials.index'));
        $this->assertDatabaseHas('testimonials', ['name' => 'Jamaah Test', 'status' => 'published']);
    }

    public function test_public_testimonial_defaults_to_draft(): void
    {
        $response = $this->post(route('testimonials.public'), [
            'name' => 'Public User',
            'email' => 'public@test.com',
            'message' => 'Great service!',
            'rating' => 4,
        ]);
        $response->assertRedirect(route('home'));
        $this->assertDatabaseHas('testimonials', ['name' => 'Public User', 'status' => 'draft']);
    }

    public function test_admin_can_update_testimonial(): void
    {
        $testimonial = Testimonial::factory()->create();
        $response = $this->actingAs($this->admin)->put(route('testimonials.update', $testimonial), [
            'name' => 'Updated', 'email' => 'u@test.com',
            'message' => 'Updated msg', 'rating' => 3, 'status' => 'published',
        ]);
        $response->assertRedirect(route('testimonials.index'));
        $this->assertDatabaseHas('testimonials', ['id' => $testimonial->id, 'name' => 'Updated']);
    }

    public function test_admin_can_delete_testimonial(): void
    {
        $testimonial = Testimonial::factory()->create();
        $response = $this->actingAs($this->admin)->delete(route('testimonials.destroy', $testimonial));
        $response->assertRedirect(route('testimonials.index'));
        $this->assertDatabaseMissing('testimonials', ['id' => $testimonial->id]);
    }

    public function test_testimonial_validates_rating_range(): void
    {
        $response = $this->actingAs($this->admin)->post(route('testimonials.store'), [
            'name' => 'Test', 'email' => 'a@test.com', 'message' => 'x', 'rating' => 6, 'status' => 'draft',
        ]);
        $response->assertSessionHasErrors('rating');
    }
}
