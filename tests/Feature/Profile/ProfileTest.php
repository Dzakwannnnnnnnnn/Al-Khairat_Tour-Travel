<?php

namespace Tests\Feature\Profile;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class ProfileTest extends TestCase
{
    use RefreshDatabase;

    private User $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
    }

    public function test_user_can_view_profile(): void
    {
        $response = $this->actingAs($this->user)->get(route('profile.edit'));
        $response->assertStatus(200);
    }

    public function test_user_can_update_profile(): void
    {
        $response = $this->actingAs($this->user)->put(route('profile.update'), [
            'name' => 'Updated Name',
            'nickname' => 'Nick',
            'email' => $this->user->email,
        ]);
        $response->assertRedirect();
        $this->assertDatabaseHas('users', ['id' => $this->user->id, 'name' => 'Updated Name']);
    }

    public function test_user_can_update_password(): void
    {
        $response = $this->actingAs($this->user)->put(route('profile.password.update'), [
            'current_password' => 'password',
            'new_password' => 'newpassword123',
            'new_password_confirmation' => 'newpassword123',
        ]);
        $response->assertRedirect();
        $this->assertTrue(Hash::check('newpassword123', $this->user->fresh()->password));
    }

    public function test_password_update_fails_with_wrong_current(): void
    {
        $response = $this->actingAs($this->user)->put(route('profile.password.update'), [
            'current_password' => 'wrong_password',
            'new_password' => 'newpassword123',
            'new_password_confirmation' => 'newpassword123',
        ]);
        $response->assertSessionHasErrors('current_password');
    }

    public function test_new_password_must_be_different(): void
    {
        $response = $this->actingAs($this->user)->put(route('profile.password.update'), [
            'current_password' => 'password',
            'new_password' => 'password',
            'new_password_confirmation' => 'password',
        ]);
        $response->assertSessionHasErrors('new_password');
    }

    public function test_guest_cannot_access_profile(): void
    {
        $response = $this->get(route('profile.edit'));
        $response->assertRedirect(route('login'));
    }

    public function test_profile_validates_unique_email(): void
    {
        $otherUser = User::factory()->create(['email' => 'taken@test.com']);

        $response = $this->actingAs($this->user)->put(route('profile.update'), [
            'name' => 'Test',
            'email' => 'taken@test.com',
        ]);
        $response->assertSessionHasErrors('email');
    }
}
