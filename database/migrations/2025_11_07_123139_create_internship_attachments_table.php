<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInternshipAttachmentsTable extends Migration
{
    public function up()
    {
        Schema::create('internship_attachments', function (Blueprint $table) {
            $table->id();
            $table->string('title');                // name / role title / hero title
            $table->longText('description')->nullable(); // description / about text
            $table->string('organization')->nullable();  // reused for org (optional)
            $table->string('duration')->nullable();      // duration or small meta text
            $table->string('image')->nullable();         // stored path in storage/public
            $table->string('apply_link')->nullable();    // application link for roles
            $table->string('icon')->nullable();          // bootstrap icon class if needed
            $table->string('type')->default('role');     // 'hero' | 'page' | 'role' | 'stat' | 'offer' | 'requirement'
            $table->json('meta')->nullable();            // any extra json
            $table->integer('stat_value')->nullable();   // numeric stats (for stat type)
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('internship_attachments');
    }
}
