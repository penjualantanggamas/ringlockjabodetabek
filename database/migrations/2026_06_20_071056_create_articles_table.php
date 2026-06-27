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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title');         // Untuk Judul Artikel
            $table->string('slug')->unique(); // Untuk URL ramah SEO (misal: pentingnya-standar-k3)
            $table->string('category');      // Untuk Kategori: edukasi-k3, proyek, instalasi
            $table->string('thumbnail');     // Untuk Menyimpan nama/path file gambar artikel
            $table->text('excerpt');         // Untuk Ringkasan pendek di halaman depan
            $table->longText('body');        // Untuk Isi konten utuh artikel (bisa menampung format teks panjang)
            $table->timestamps();            // Otomatis membuat kolom created_at (tanggal rilis) & updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
