<?php

namespace Tests\Feature\Admin;

use App\Models\User;
use App\Models\Guide;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GuideManagementTest extends TestCase
{
    use RefreshDatabase;

    private User $admin;

    protected function setUp(): void
    {
        parent::setUp();
        $this->admin = User::factory()->admin()->create();
    }

    public function test_admin_can_view_guides_admin_list(): void
    {
        $response = $this->actingAs($this->admin)->get(route('guides.admin-index'));
        $response->assertStatus(200);
    }

    public function test_admin_can_create_guide(): void
    {
        $response = $this->actingAs($this->admin)->post(route('guides.store'), [
            'category' => 'umrah',
            'slug' => 'test-guide',
            'title' => 'Panduan Test',
            'badge' => 'Panduan',
            'icon' => '📖',
            'description' => 'Deskripsi panduan test',
            'overview' => 'Overview panduan lengkap',
            'is_active' => true,
        ]);
        $response->assertRedirect(route('guides.admin-index'));
        $this->assertDatabaseHas('guides', ['slug' => 'test-guide']);
    }

    public function test_admin_can_update_guide(): void
    {
        $guide = Guide::factory()->create();
        $response = $this->actingAs($this->admin)->put(route('guides.update', $guide), [
            'category' => 'haji',
            'slug' => $guide->slug,
            'title' => 'Updated Guide',
            'badge' => 'Updated',
            'icon' => '📚',
            'description' => 'Updated desc',
            'overview' => 'Updated overview',
        ]);
        $response->assertRedirect(route('guides.admin-index'));
        $this->assertDatabaseHas('guides', ['id' => $guide->id, 'title' => 'Updated Guide']);
    }

    public function test_admin_can_delete_guide(): void
    {
        $guide = Guide::factory()->create();
        $response = $this->actingAs($this->admin)->delete(route('guides.destroy', $guide));
        $response->assertRedirect(route('guides.admin-index'));
        $this->assertDatabaseMissing('guides', ['id' => $guide->id]);
    }

    public function test_admin_can_toggle_guide_active(): void
    {
        $guide = Guide::factory()->create(['is_active' => true]);
        $this->actingAs($this->admin)->post(route('guides.toggle-active', $guide));
        $this->assertFalse($guide->fresh()->is_active);
    }

    public function test_guide_validates_unique_slug(): void
    {
        Guide::factory()->create(['slug' => 'existing-slug']);
        $response = $this->actingAs($this->admin)->post(route('guides.store'), [
            'category' => 'umrah', 'slug' => 'existing-slug', 'title' => 'T',
            'badge' => 'B', 'icon' => '📖', 'description' => 'D', 'overview' => 'O',
        ]);
        $response->assertSessionHasErrors('slug');
    }
}
