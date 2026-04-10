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
        Schema::table('bookings', function (Blueprint $table) {
            $table->string('orderer_phone')->nullable()->after('full_name');
            $table->string('orderer_email')->nullable()->after('orderer_phone');
            $table->string('room_variant')->nullable()->after('nik');
            $table->string('voucher_code')->nullable()->after('room_variant');
            $table->text('notes')->nullable()->after('voucher_code');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropColumn(['orderer_phone', 'orderer_email', 'room_variant', 'voucher_code', 'notes']);
        });
    }
};
