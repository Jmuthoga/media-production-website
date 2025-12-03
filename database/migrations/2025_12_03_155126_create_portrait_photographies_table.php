<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('portrait_photographies', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->text('description')->nullable();

            // Hero images
            $table->string('hero_image')->nullable();
            $table->string('hero_right_image')->nullable();

            // Gallery JSON
            $table->json('gallery')->nullable();

            // CTA
            $table->string('cta_title')->nullable();
            $table->text('cta_description')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('portrait_photographies');
    }
};
