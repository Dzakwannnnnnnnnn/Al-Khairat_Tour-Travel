<?php

namespace Tests\Feature\Admin;

use App\Models\User;
use App\Models\Slideshow;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class SlideshowManagementTest extends TestCase
{
    use RefreshDatabase;

    private User $admin;

    protected function setUp(): void
    {
        parent::setUp();
        $this->admin = User::factory()->admin()->create();
    }

    public function test_admin_can_view_slideshows(): void
    {
        $response = $this->actingAs($this->admin)->get(route('slideshow.index'));
        $response->assertStatus(200);
    }

    public function test_admin_can_create_slideshow(): void
    {
        $response = $this->actingAs($this->admin)->post(route('slideshow.store'), [
            'title' => 'Test Slideshow',
            'image_url' => 'https://example.com/image.jpg',
            'is_active' => true,
        ]);
        $response->assertRedirect(route('slideshow.index'));
        $this->assertDatabaseHas('slideshows', ['title' => 'Test Slideshow']);
    }

    public function test_admin_can_update_slideshow(): void
    {
        $slideshow = Slideshow::factory()->create();
        $response = $this->actingAs($this->admin)->put(route('slideshow.update', $slideshow), [
            'title' => 'Updated Slide',
            'image_url' => 'https://example.com/new.jpg',
        ]);
        $response->assertRedirect(route('slideshow.index'));
        $this->assertDatabaseHas('slideshows', ['id' => $slideshow->id, 'title' => 'Updated Slide']);
    }

    public function test_admin_can_delete_slideshow(): void
    {
        $slideshow = Slideshow::factory()->create();
        $response = $this->actingAs($this->admin)->delete(route('slideshow.destroy', $slideshow));
        $response->assertRedirect(route('slideshow.index'));
        $this->assertDatabaseMissing('slideshows', ['id' => $slideshow->id]);
    }

    public function test_admin_can_toggle_slideshow_active(): void
    {
        $slideshow = Slideshow::factory()->create(['is_active' => true]);
        $this->actingAs($this->admin)->post(route('slideshow.toggle-active', $slideshow));
        $this->assertFalse($slideshow->fresh()->is_active);
    }

    public function test_admin_can_update_slideshow_order(): void
    {
        $s1 = Slideshow::factory()->create();
        $s2 = Slideshow::factory()->create();

        $response = $this->actingAs($this->admin)->post(route('slideshow.update-order'), [
            'order' => [$s2->id, $s1->id],
        ]);
        $response->assertJson(['success' => true]);
        $this->assertEquals(1, $s2->fresh()->order);
        $this->assertEquals(2, $s1->fresh()->order);
    }
}
