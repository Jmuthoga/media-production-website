<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestimonialsTable extends Migration
{
    public function up()
    {
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->string('client_name');
            $table->text('message');
            $table->string('position')->nullable();
            $table->integer('rating')->nullable();
            $table->boolean('approved')->default(false);
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('testimonials');
    }
};
