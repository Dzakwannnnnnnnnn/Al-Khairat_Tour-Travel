<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('birth_place')->nullable()->after('name');
            $table->date('birth_date')->nullable()->after('birth_place');
            $table->string('address')->nullable()->after('birth_date');
            $table->string('nik', 16)->nullable()->after('address');
        });

        Schema::table('bookings', function (Blueprint $table) {
            $table->string('full_name')->nullable()->after('product_id');
            $table->string('birth_place')->nullable()->after('full_name');
            $table->date('birth_date')->nullable()->after('birth_place');
            $table->string('address')->nullable()->after('birth_date');
            $table->string('nik', 16)->nullable()->after('address');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['birth_place', 'birth_date', 'address', 'nik']);
        });

        Schema::table('bookings', function (Blueprint $table) {
            $table->dropColumn(['full_name', 'birth_place', 'birth_date', 'address', 'nik']);
        });
    }
};
