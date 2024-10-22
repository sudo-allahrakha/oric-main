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
        Schema::create('employment_records', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Foreign key to the User table
            $table->string('organization');
            $table->enum('sector', ['Government', 'Semi-Government', 'Private']);
            $table->string('post');
            $table->string('bps_tts')->nullable(); // Optional BPS/TTS field
            $table->date('date_from');
            $table->date('date_to')->nullable(); // Nullable, in case the person is currently employed

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employment_records');
    }
};
