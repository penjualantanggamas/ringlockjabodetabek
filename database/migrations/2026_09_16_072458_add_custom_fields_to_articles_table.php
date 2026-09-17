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
        Schema::table('articles', function (Blueprint $table) {
            $table->string('prefix')->default('jualscaffolding')->after('title');

            // 2. FAQ Pertanyaan (Disimpan sebagai data JSON array)
            $table->json('faqs')->nullable()->after('body');

            // 3. Meta Tags SEO
            $table->string('meta_title')->nullable()->after('faqs');
            $table->string('meta_author')->nullable()->after('meta_title');
            $table->string('meta_keywords')->nullable()->after('meta_author');
            $table->text('meta_description')->nullable()->after('meta_keywords');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->dropColumn([
                'prefix',
                'faqs',
                'meta_title',
                'meta_author',
                'meta_keywords',
                'meta_description',
            ]);
        });
    }
};
