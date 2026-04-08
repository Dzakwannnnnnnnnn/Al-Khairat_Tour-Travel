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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('category')->default('Standar'); // Standar, Premium, Ekonomis
            $table->decimal('price', 15, 2)->default(0);
            $table->string('duration')->nullable(); // e.g., "9 Hari", "14 Hari"
            $table->text('description')->nullable();
            $table->json('features')->nullable(); // JSON array of features
            $table->integer('stock')->default(0);
            $table->string('status')->default('active'); // active, inactive
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
