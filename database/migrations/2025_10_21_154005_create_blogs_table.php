<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('excerpt')->nullable();
            $table->longText('body')->nullable();
            $table->foreignId('author_id')->constrained('users');
            $table->boolean('published')->default(false);
            $table->timestamp('published_at')->nullable();
            $table->string('cover_image')->nullable();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('blogs');
    }
};
