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
        Schema::create('guides', function (Blueprint $table) {
            $table->id();
            $table->string('category'); // umrah, haji
            $table->string('slug'); // dokumen, checklist, tata-cara, faq, doa, tips
            $table->string('title');
            $table->string('badge');
            $table->string('icon');
            $table->text('description');
            $table->longText('overview');
            $table->json('key_points')->nullable();
            $table->json('sections')->nullable();
            $table->json('tips')->nullable();
            $table->boolean('is_active')->default(true);
            $table->integer('order')->default(0);
            $table->timestamps();
            
            $table->unique(['category', 'slug']);
            $table->index(['category', 'is_active']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guides');
    }
};
