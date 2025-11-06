<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePricingPlansTable extends Migration
{
    public function up()
    {
        Schema::create('pricing_plans', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->decimal('price', 12, 2)->nullable();
            $table->text('features')->nullable(); // json or newline list
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('pricing_plans');
    }
};
