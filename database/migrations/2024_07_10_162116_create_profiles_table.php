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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('academic_title')->nullable();
            $table->string('subject')->nullable();
            $table->string('specialization')->nullable();
            $table->string('research_area')->nullable();
            $table->string('nationality')->nullable();
            $table->string('researcher_id')->nullable();
            $table->string('orcid_id')->nullable();
            $table->string('google_scholar_link')->nullable();
            $table->string('contact')->nullable();
            $table->text('biosketch')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
