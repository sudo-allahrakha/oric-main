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
        Schema::create('research_abstracts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Linking with user table
            $table->string('title');
            $table->string('name_of_conference');
            $table->date('date');
            $table->integer('page_no');
            $table->enum('publication_type', ['National', 'International']);
            $table->enum('category', ['Oral presentation', 'Post', 'Presentation']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('research_abstracts');
    }
};
