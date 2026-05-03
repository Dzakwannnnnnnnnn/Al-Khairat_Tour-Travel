<?php

namespace Tests\Unit\Models;

use App\Models\User;
use App\Models\Booking;
use App\Models\SavingsPlan;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserModelTest extends TestCase
{
    use RefreshDatabase;

    public function test_is_admin_returns_true_for_admin_role(): void
    {
        $user = User::factory()->admin()->create();
        $this->assertTrue($user->isAdmin());
    }

    public function test_is_admin_returns_false_for_user_role(): void
    {
        $user = User::factory()->create(['role' => 'user']);
        $this->assertFalse($user->isAdmin());
    }

    public function test_is_admin_is_case_insensitive(): void
    {
        $user = User::factory()->create(['role' => 'Admin']);
        $this->assertTrue($user->isAdmin());
    }

    public function test_avatar_url_returns_default_when_no_avatar(): void
    {
        $user = User::factory()->create(['avatar' => null]);
        $this->assertStringContains('ui-avatars.com', $user->avatar_url);
    }

    public function test_avatar_url_returns_storage_path_when_avatar_exists(): void
    {
        $user = User::factory()->create(['avatar' => 'avatars/test.jpg']);
        $this->assertStringContains('storage/avatars/test.jpg', $user->avatar_url);
    }

    public function test_user_has_bookings_relationship(): void
    {
        $user = User::factory()->create();
        $this->assertInstanceOf(\Illuminate\Database\Eloquent\Relations\HasMany::class, $user->bookings());
    }

    public function test_user_has_savings_plans_relationship(): void
    {
        $user = User::factory()->create();
        $this->assertInstanceOf(\Illuminate\Database\Eloquent\Relations\HasMany::class, $user->savingsPlans());
    }

    /**
     * Helper: assertStringContains (since assertStringContainsString is the actual PHPUnit method)
     */
    private function assertStringContains(string $needle, string $haystack): void
    {
        $this->assertStringContainsString($needle, $haystack);
    }
}
