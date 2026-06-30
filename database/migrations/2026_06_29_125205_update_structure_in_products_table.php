<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            // 1. Cek jika kolom 'size' ada, kita ubah namanya menjadi 'variant' agar cocok dengan seeder
            if (Schema::hasColumn('products', 'size') && !Schema::hasColumn('products', 'variant')) {
                $table->renameColumn('size', 'variant');
            }

            // 2. Tambahkan kolom 'price' jika belum ada
            if (!Schema::hasColumn('products', 'price')) {
                $table->decimal('price', 12, 2)->default(0)->after('name');
            }

            // 3. Tambahkan kolom 'source_code' jika belum ada
            if (!Schema::hasColumn('products', 'source_code')) {
                $table->string('source_code')->nullable()->after('price');
            }
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            // Kembalikan ke struktur semula jika di-rollback
            if (Schema::hasColumn('products', 'variant') && !Schema::hasColumn('products', 'size')) {
                $table->renameColumn('variant', 'size');
            }
            $table->dropColumn(['price', 'source_code']);
        });
    }
};