<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLiveEventsTable extends Migration
{
    public function up()
    {
        Schema::create('live_events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->string('embed_url')->nullable(); // e.g. YouTube/Vimeo/Mux iframe or HLS
            $table->timestamp('start_at')->nullable();
            $table->boolean('is_live')->default(false);
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('live_events');
    }
};
