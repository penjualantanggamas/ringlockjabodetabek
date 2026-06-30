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
        Schema::table('users', function (Blueprint $blueprint) {
            // Menambahkan kolom alamat baru (nullable agar user lama tidak eror saat migrasi dijalankan)
            $blueprint->string('provinsi')->nullable()->after('phone_number');
            $blueprint->string('kota')->nullable()->after('provinsi');
            $blueprint->string('kecamatan')->nullable()->after('kota');
            $blueprint->string('kelurahan')->nullable()->after('kecamatan');
            $blueprint->string('kode_pos', 10)->nullable()->after('kelurahan');
            $blueprint->text('detail_alamat')->nullable()->after('kode_pos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $blueprint) {
            // Menghapus kolom jika migration di-rollback
            $blueprint->dropColumn(['provinsi', 'kota', 'kecamatan', 'kelurahan', 'kode_pos', 'detail_alamat']);
        });
    }
};