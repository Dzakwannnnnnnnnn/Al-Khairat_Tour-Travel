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
        Schema::table('savings_plans', function (Blueprint $table) {
            $table->string('refund_bank_name')->nullable()->after('refund_requested_at');
            $table->string('refund_bank_account')->nullable()->after('refund_bank_name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('savings_plans', function (Blueprint $table) {
            $table->dropColumn(['refund_bank_name', 'refund_bank_account']);
        });
    }
};
