<?php

namespace Tests\Feature\Public;

use App\Models\Product;
use App\Models\Testimonial;
use App\Models\Slideshow;
use App\Models\Setting;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LandingPageTest extends TestCase
{
    use RefreshDatabase;

    public function test_landing_page_is_accessible(): void
    {
        $response = $this->get(route('home'));
        $response->assertStatus(200);
    }

    public function test_landing_page_shows_active_products(): void
    {
        Product::factory()->create(['name' => 'Paket Aktif', 'status' => 'active']);
        Product::factory()->create(['name' => 'Paket Nonaktif', 'status' => 'inactive']);

        $response = $this->get(route('home'));
        $response->assertStatus(200);
        $response->assertSee('Paket Aktif');
    }

    public function test_landing_page_shows_published_testimonials(): void
    {
        $product = Product::factory()->create();
        Testimonial::factory()->published()->create([
            'name' => 'Happy Jamaah',
            'product_id' => $product->id,
        ]);

        $response = $this->get(route('home'));
        $response->assertStatus(200);
    }

    public function test_gallery_page_is_accessible(): void
    {
        $response = $this->get(route('gallery'));
        $response->assertStatus(200);
    }

    public function test_panduan_tasuh_page_is_accessible(): void
    {
        $response = $this->get(route('panduan-tasuh'));
        $response->assertStatus(200);
    }

    public function test_contact_form_validates_required_fields(): void
    {
        $response = $this->postJson(route('contact.send'), []);
        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['name', 'email', 'subject', 'message']);
    }

    public function test_public_testimonial_validates_required(): void
    {
        $response = $this->post(route('testimonials.public'), []);
        $response->assertSessionHasErrors(['name', 'email', 'message', 'rating']);
    }
}
