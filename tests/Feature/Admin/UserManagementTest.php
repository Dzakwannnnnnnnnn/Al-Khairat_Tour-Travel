<?php

namespace Tests\Feature\Admin;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserManagementTest extends TestCase
{
    use RefreshDatabase;

    private User $admin;

    protected function setUp(): void
    {
        parent::setUp();
        $this->admin = User::factory()->admin()->create();
    }

    public function test_admin_can_view_users_list(): void
    {
        User::factory()->count(3)->create();

        $response = $this->actingAs($this->admin)->get(route('users.index'));
        $response->assertStatus(200);
    }

    public function test_admin_can_create_user(): void
    {
        $response = $this->actingAs($this->admin)->post(route('users.store'), [
            'name' => 'New User',
            'email' => 'newuser@test.com',
            'password' => 'password123',
            'role' => 'user',
        ]);

        $response->assertRedirect(route('users.index'));
        $this->assertDatabaseHas('users', ['email' => 'newuser@test.com']);
    }

    public function test_admin_can_update_user(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($this->admin)->put(route('users.update', $user), [
            'name' => 'Updated Name',
            'email' => $user->email,
            'role' => 'admin',
        ]);

        $response->assertRedirect(route('users.index'));
        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'name' => 'Updated Name',
            'role' => 'admin',
        ]);
    }

    public function test_admin_can_delete_other_user(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($this->admin)->delete(route('users.destroy', $user));

        $response->assertRedirect(route('users.index'));
        $this->assertDatabaseMissing('users', ['id' => $user->id]);
    }

    public function test_admin_cannot_delete_self(): void
    {
        $response = $this->actingAs($this->admin)->delete(route('users.destroy', $this->admin));

        $response->assertRedirect(route('users.index'));
        $response->assertSessionHas('error');
        $this->assertDatabaseHas('users', ['id' => $this->admin->id]);
    }

    public function test_non_admin_cannot_access_user_management(): void
    {
        $user = User::factory()->create(['role' => 'user']);
        $response = $this->actingAs($user)->get(route('users.index'));
        $response->assertRedirect(route('home'));
    }

    public function test_user_creation_validates_required_fields(): void
    {
        $response = $this->actingAs($this->admin)->post(route('users.store'), []);
        $response->assertSessionHasErrors(['name', 'email', 'password', 'role']);
    }

    public function test_user_creation_validates_unique_email(): void
    {
        User::factory()->create(['email' => 'existing@test.com']);

        $response = $this->actingAs($this->admin)->post(route('users.store'), [
            'name' => 'Test',
            'email' => 'existing@test.com',
            'password' => 'password123',
            'role' => 'user',
        ]);

        $response->assertSessionHasErrors('email');
    }

    public function test_search_filters_users(): void
    {
        User::factory()->create(['name' => 'Ahmad Jamaah']);
        User::factory()->create(['name' => 'Budi Member']);

        $response = $this->actingAs($this->admin)->get(route('users.index', ['search' => 'Ahmad']));
        $response->assertStatus(200);
    }
}
