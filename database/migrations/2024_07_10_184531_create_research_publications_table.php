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
        Schema::create('research_publications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('author')->nullable();
            $table->string('title');
            $table->string('journal_name');
            $table->integer('publishing_year');
            $table->string('journal_volume')->nullable();
            $table->string('impact_factor')->nullable();
            $table->string('doi_url')->nullable();
            $table->enum('journal_type', ['National', 'International'])->nullable();
            $table->boolean('hec_recognized')->default(false);
            $table->string('hrjs_category')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('research_publications');
    }
};
