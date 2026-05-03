<?php

namespace Tests\Feature\Middleware;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminMiddlewareTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_is_redirected_to_login(): void
    {
        $response = $this->get(route('users.index'));
        $response->assertRedirect(route('login'));
    }

    public function test_non_admin_is_redirected_to_home(): void
    {
        $user = User::factory()->create(['role' => 'user']);

        $response = $this->actingAs($user)->get(route('users.index'));
        $response->assertRedirect(route('home'));
    }

    public function test_admin_can_access_admin_routes(): void
    {
        $admin = User::factory()->admin()->create();

        $response = $this->actingAs($admin)->get(route('users.index'));
        $response->assertStatus(200);
    }
}
