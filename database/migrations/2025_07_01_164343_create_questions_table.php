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
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->string('category');
            $table->text('question_text');
            $table->string('correct_answer');
            $table->json('options'); // Menyimpan semua pilihan (termasuk yg benar) dalam format JSON
            $table->string('clue')->nullable();
            $table->string('image_path')->nullable(); // Hapus ->after('clue') dari sini
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};
