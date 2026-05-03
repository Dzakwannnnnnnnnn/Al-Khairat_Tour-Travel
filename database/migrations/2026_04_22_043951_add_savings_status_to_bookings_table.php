<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Skip ENUM alteration for SQLite (testing) - SQLite uses TEXT for all string columns
        if (DB::getDriverName() !== 'sqlite') {
            DB::statement("ALTER TABLE bookings MODIFY COLUMN status ENUM('pending', 'dp_paid', 'fully_paid', 'completed', 'cancelled', 'savings') NOT NULL DEFAULT 'pending'");
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (DB::getDriverName() !== 'sqlite') {
            DB::statement("ALTER TABLE bookings MODIFY COLUMN status ENUM('pending', 'dp_paid', 'fully_paid', 'completed', 'cancelled') NOT NULL DEFAULT 'pending'");
        }
    }
};
