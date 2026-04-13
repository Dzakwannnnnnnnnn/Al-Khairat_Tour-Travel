<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class ProfilePasswordUpdateTest extends TestCase
{
    use RefreshDatabase;

    public function test_authenticated_user_can_update_password_from_profile_page(): void
    {
        $user = User::factory()->create([
            'password' => Hash::make('password-lama'),
        ]);

        $response = $this->actingAs($user)->from(route('profile.edit'))->put(route('profile.password.update'), [
            'current_password' => 'password-lama',
            'new_password' => 'password-baru-123',
            'new_password_confirmation' => 'password-baru-123',
        ]);

        $response->assertRedirect(route('profile.edit'));
        $response->assertSessionHas('success', 'Password Anda berhasil diperbarui.');

        $this->assertTrue(Hash::check('password-baru-123', $user->fresh()->password));

        Auth::logout();

        $this->post(route('login'), [
            'email' => $user->email,
            'password' => 'password-baru-123',
        ])->assertRedirect(route('home'));

        $this->assertAuthenticated();
    }

    public function test_password_update_fails_when_current_password_is_wrong(): void
    {
        $user = User::factory()->create([
            'password' => Hash::make('password-lama'),
        ]);

        $response = $this->actingAs($user)->from(route('profile.edit'))->put(route('profile.password.update'), [
            'current_password' => 'salah-total',
            'new_password' => 'password-baru-123',
            'new_password_confirmation' => 'password-baru-123',
        ]);

        $response->assertRedirect(route('profile.edit'));
        $response->assertSessionHasErrors('current_password');
        $this->assertTrue(Hash::check('password-lama', $user->fresh()->password));
    }
}
