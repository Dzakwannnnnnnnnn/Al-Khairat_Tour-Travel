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
        Schema::table('products', function (Blueprint $table) {
            $table->decimal('price_quad', 15, 2)->nullable()->after('price');
            $table->decimal('price_triple', 15, 2)->nullable()->after('price_quad');
            $table->decimal('price_double', 15, 2)->nullable()->after('price_triple');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['price_quad', 'price_triple', 'price_double']);
        });
    }
};
