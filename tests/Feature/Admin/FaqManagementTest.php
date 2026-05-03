<?php

namespace Tests\Feature\Admin;

use App\Models\User;
use App\Models\Faq;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FaqManagementTest extends TestCase
{
    use RefreshDatabase;

    private User $admin;

    protected function setUp(): void
    {
        parent::setUp();
        $this->admin = User::factory()->admin()->create();
    }

    public function test_admin_can_view_faqs(): void
    {
        $response = $this->actingAs($this->admin)->get(route('faqs.index'));
        $response->assertStatus(200);
    }

    public function test_admin_can_create_faq(): void
    {
        $response = $this->actingAs($this->admin)->post(route('faqs.store'), [
            'question' => 'Bagaimana cara mendaftar?',
            'answer' => 'Kunjungi website dan klik daftar.',
            'category' => 'umum',
        ]);
        $response->assertRedirect(route('faqs.index'));
        $this->assertDatabaseHas('faqs', ['question' => 'Bagaimana cara mendaftar?']);
    }

    public function test_admin_can_update_faq(): void
    {
        $faq = Faq::factory()->create();
        $response = $this->actingAs($this->admin)->put(route('faqs.update', $faq), [
            'question' => 'Updated question?',
            'answer' => 'Updated answer.',
        ]);
        $response->assertRedirect(route('faqs.index'));
        $this->assertDatabaseHas('faqs', ['id' => $faq->id, 'question' => 'Updated question?']);
    }

    public function test_admin_can_delete_faq(): void
    {
        $faq = Faq::factory()->create();
        $response = $this->actingAs($this->admin)->delete(route('faqs.destroy', $faq));
        $response->assertRedirect(route('faqs.index'));
        $this->assertDatabaseMissing('faqs', ['id' => $faq->id]);
    }

    public function test_faq_validates_required_fields(): void
    {
        $response = $this->actingAs($this->admin)->post(route('faqs.store'), []);
        $response->assertSessionHasErrors(['question', 'answer']);
    }
}
