<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // ID auto increment
            $table->string('name'); // Nama produk (contoh: \"Ringlock Standard Vertical\")
            $table->string('slug')->unique(); // URL-friendly name (contoh: \"ringlock-standard-vertical-05m\")
            $table->string('category'); // Kategori (Vertical, Ledger, Aksesoris, dll)
            $table->string('size')->nullable(); // Ukuran (0.5m, 1m, 1.5m, dst) - nullable karena tidak semua produk punya ukuran
            $table->text('description'); // Deskripsi produk
            $table->text('specifications')->nullable(); // Spesifikasi teknis (tebal pipa, material, dll)
            $table->string('image')->nullable(); // Path gambar produk
            $table->enum('stock_status', ['available', 'out_of_stock', 'pre_order'])->default('available'); // Status stok
            $table->boolean('is_active')->default(true); // Apakah produk aktif ditampilkan?
            $table->timestamps(); // created_at & updated_at otomatis
        });
    }

    /**
     * Rollback migration (hapus tabel products).
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
