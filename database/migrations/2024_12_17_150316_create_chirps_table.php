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
        // Tambahkan pada migrasi Chirp
           Schema::table('chirps', function (Blueprint $table) {
           $table->string('media')->nullable(); // Untuk menyimpan path file
});

        Schema::create('chirps', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('message');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('chirps', function (Blueprint $table) {
            $table->dropColumn('media'); // Menghapus kolom media jika migrasi dibatalkan
        });
        Schema::dropIfExists('chirps');
    }
};
