<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOurStorySectionsTable extends Migration
{
    public function up()
    {
        Schema::create('our_story_sections', function (Blueprint $table) {
            $table->id();
            $table->string('type')->default('section'); // hero, about, counter, faq, side_feature, client
            $table->string('title')->nullable();        // Section title or FAQ question
            $table->longText('description')->nullable(); // Section text or FAQ answer
            $table->string('image')->nullable();        // Images for hero, side feature, clients
            $table->integer('stat_value')->nullable();  // Counters numeric value
            $table->json('meta')->nullable();           // Extra data if needed (e.g., counter label, client alt text)
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('our_story_sections');
    }
}
