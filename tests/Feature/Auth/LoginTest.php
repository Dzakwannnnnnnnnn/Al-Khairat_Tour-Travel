<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    public function test_login_page_is_accessible(): void
    {
        $response = $this->get(route('login'));
        $response->assertStatus(200);
    }

    public function test_user_can_login_with_valid_credentials(): void
    {
        $user = User::factory()->create([
            'email' => 'test@gmail.com',
            'role' => 'user',
        ]);

        $response = $this->post(route('login'), [
            'email' => 'test@gmail.com',
            'password' => 'password',
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect(route('home'));
    }

    public function test_admin_is_redirected_to_dashboard_after_login(): void
    {
        $admin = User::factory()->admin()->create([
            'email' => 'admin@gmail.com',
        ]);

        $response = $this->post(route('login'), [
            'email' => 'admin@gmail.com',
            'password' => 'password',
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect(route('dashboard'));
    }

    public function test_user_cannot_login_with_wrong_password(): void
    {
        $user = User::factory()->create([
            'email' => 'test@gmail.com',
        ]);

        $response = $this->post(route('login'), [
            'email' => 'test@gmail.com',
            'password' => 'wrong-password',
        ]);

        $this->assertGuest();
        $response->assertSessionHasErrors('email');
    }

    public function test_user_cannot_login_with_nonexistent_email(): void
    {
        $response = $this->post(route('login'), [
            'email' => 'nobody@gmail.com',
            'password' => 'password',
        ]);

        $this->assertGuest();
        $response->assertSessionHasErrors('email');
    }

    public function test_intended_product_is_stored_in_session(): void
    {
        $response = $this->get(route('login', ['intended_product' => 5]));
        $response->assertSessionHas('intended_product', 5);
    }

    public function test_intended_product_redirect_after_login(): void
    {
        $user = User::factory()->create(['email' => 'test@gmail.com']);
        
        // First visit login with intended_product
        $this->get(route('login', ['intended_product' => 5]));
        
        $response = $this->post(route('login'), [
            'email' => 'test@gmail.com',
            'password' => 'password',
        ]);

        $response->assertRedirect(route('home'));
        $response->assertSessionHas('open_booking', 5);
    }

    public function test_user_can_logout(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->post(route('logout'));

        $this->assertGuest();
        $response->assertRedirect(route('login'));
    }

    public function test_login_validates_required_fields(): void
    {
        $response = $this->post(route('login'), []);
        $response->assertSessionHasErrors(['email', 'password']);
    }
}
