<?php

namespace Tests\Feature\Admin;

use App\Models\User;
use App\Models\Setting;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SettingManagementTest extends TestCase
{
    use RefreshDatabase;

    private User $admin;

    protected function setUp(): void
    {
        parent::setUp();
        $this->admin = User::factory()->admin()->create();
    }

    public function test_admin_can_view_settings(): void
    {
        $response = $this->actingAs($this->admin)->get(route('settings.index'));
        $response->assertStatus(200);
    }

    public function test_admin_can_create_setting(): void
    {
        $response = $this->actingAs($this->admin)->post(route('settings.store'), [
            'key' => 'whatsapp_number',
            'value' => '6281253088788',
            'type' => 'text',
        ]);
        $response->assertRedirect(route('settings.index'));
        $this->assertDatabaseHas('settings', ['key' => 'whatsapp_number']);
    }

    public function test_admin_can_update_setting(): void
    {
        $setting = Setting::factory()->create();
        $response = $this->actingAs($this->admin)->put(route('settings.update', $setting), [
            'key' => $setting->key,
            'value' => 'updated_value',
            'type' => 'text',
        ]);
        $response->assertRedirect(route('settings.index'));
        $this->assertDatabaseHas('settings', ['id' => $setting->id, 'value' => 'updated_value']);
    }

    public function test_admin_can_delete_setting(): void
    {
        $setting = Setting::factory()->create();
        $response = $this->actingAs($this->admin)->delete(route('settings.destroy', $setting));
        $response->assertRedirect(route('settings.index'));
        $this->assertDatabaseMissing('settings', ['id' => $setting->id]);
    }

    public function test_setting_key_must_be_unique(): void
    {
        Setting::factory()->create(['key' => 'duplicate_key']);
        $response = $this->actingAs($this->admin)->post(route('settings.store'), [
            'key' => 'duplicate_key', 'value' => 'test', 'type' => 'text',
        ]);
        $response->assertSessionHasErrors('key');
    }
}
