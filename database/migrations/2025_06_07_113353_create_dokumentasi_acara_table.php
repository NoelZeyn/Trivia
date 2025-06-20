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
        Schema::create('dokumentasi_acara', function (Blueprint $table) {
            $table->id();
            $table->foreignId('acara_id_fk')->constrained('acara')->onDelete('cascade');
            $table->enum('tipe', ['foto', 'video', 'dokumen']);
            $table->string('file_path')->nullable(); // Untuk menyimpan path foto/video/file dokumen
            $table->string('link')->nullable();      // Untuk menyimpan link jika dokumen berupa URL
            $table->text('catatan')->nullable();
            $table->date('uploaded_at')->nullable(); // dibuat nullable untuk fleksibilitas
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dokumentasi_acara');
    }
};
