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
        Schema::table('questions', function (Blueprint $table) {
            // Tambahkan kolom untuk deskripsi detail setelah kolom 'clue'
            $table->text('description')->nullable()->after('clue');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('questions', function (Blueprint $table) {
            // Hapus kolom jika migrasi di-rollback
            $table->dropColumn('description');
        });
    }
};
