<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Skip ENUM alteration for SQLite (testing) - SQLite doesn't enforce column types
        if (DB::getDriverName() !== 'sqlite') {
            DB::statement("
                ALTER TABLE bookings
                MODIFY status ENUM('pending', 'dp_paid', 'fully_paid', 'completed', 'cancelled')
                NOT NULL DEFAULT 'pending'
            ");
        }

        DB::table('bookings')
            ->where('status', 'paid')
            ->update(['status' => 'fully_paid']);

        DB::table('bookings')
            ->where('status', 'canceled')
            ->update(['status' => 'cancelled']);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('bookings')
            ->where('status', 'fully_paid')
            ->update(['status' => 'paid']);

        DB::table('bookings')
            ->where('status', 'cancelled')
            ->update(['status' => 'canceled']);

        if (DB::getDriverName() !== 'sqlite') {
            DB::statement("
                ALTER TABLE bookings
                MODIFY status ENUM('pending', 'paid', 'canceled')
                NOT NULL DEFAULT 'pending'
            ");
        }
    }
};
