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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Menyimpan nama produk (Contoh: Ringlock Standard)
            $table->string('variant')->default('Standard'); // Menyimpan ukuran/varian (Contoh: 1.5 m atau All Size)
            $table->integer('price')->default(0); // Menyimpan nominal harga berupa angka bulat
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};