<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGalleriesTable extends Migration
{
    public function up()
    {
        Schema::create('galleries', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->enum('type', ['image', 'video', 'live'])->default('image');
            $table->string('mime')->nullable();
            $table->string('path')->nullable(); // storage path
            $table->foreignId('service_item_id')->nullable()->constrained('service_items')->nullOnDelete();
            $table->foreignId('county_id')->nullable()->constrained('counties')->nullOnDelete();
            $table->text('description')->nullable();
            $table->boolean('is_public')->default(true);
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('galleries');
    }
};
