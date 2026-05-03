<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    use RefreshDatabase;

    public function test_register_page_is_accessible(): void
    {
        $response = $this->get(route('register'));
        $response->assertStatus(200);
    }

    public function test_user_can_register_with_valid_data(): void
    {
        $response = $this->post(route('register'), [
            'name' => 'Test User',
            'phone' => '081234567890',
            'email' => 'testuser@gmail.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect(route('home'));
        $this->assertDatabaseHas('users', [
            'email' => 'testuser@gmail.com',
            'role' => 'user',
        ]);
    }

    public function test_registration_fails_with_non_gmail_email(): void
    {
        $response = $this->post(route('register'), [
            'name' => 'Test User',
            'phone' => '081234567890',
            'email' => 'testuser@yahoo.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ]);

        $this->assertGuest();
        $response->assertSessionHasErrors('email');
    }

    public function test_registration_fails_with_invalid_phone_format(): void
    {
        $response = $this->post(route('register'), [
            'name' => 'Test User',
            'phone' => '12345',
            'email' => 'testuser@gmail.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ]);

        $this->assertGuest();
        $response->assertSessionHasErrors('phone');
    }

    public function test_registration_fails_with_short_password(): void
    {
        $response = $this->post(route('register'), [
            'name' => 'Test User',
            'phone' => '081234567890',
            'email' => 'testuser@gmail.com',
            'password' => 'short',
            'password_confirmation' => 'short',
        ]);

        $this->assertGuest();
        $response->assertSessionHasErrors('password');
    }

    public function test_registration_fails_with_password_mismatch(): void
    {
        $response = $this->post(route('register'), [
            'name' => 'Test User',
            'phone' => '081234567890',
            'email' => 'testuser@gmail.com',
            'password' => 'password123',
            'password_confirmation' => 'different123',
        ]);

        $this->assertGuest();
        $response->assertSessionHasErrors('password');
    }

    public function test_registration_fails_with_duplicate_email(): void
    {
        User::factory()->create(['email' => 'existing@gmail.com']);

        $response = $this->post(route('register'), [
            'name' => 'Test User',
            'phone' => '081234567890',
            'email' => 'existing@gmail.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ]);

        $this->assertGuest();
        $response->assertSessionHasErrors('email');
    }

    public function test_intended_product_redirect_after_registration(): void
    {
        $this->get(route('register', ['intended_product' => 3]));

        $response = $this->post(route('register'), [
            'name' => 'Test User',
            'phone' => '081234567890',
            'email' => 'testuser@gmail.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ]);

        $response->assertRedirect(route('home'));
        $response->assertSessionHas('open_booking', 3);
    }

    public function test_registration_validates_required_fields(): void
    {
        $response = $this->post(route('register'), []);
        $response->assertSessionHasErrors(['name', 'phone', 'email', 'password']);
    }
}
