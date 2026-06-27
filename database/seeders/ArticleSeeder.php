<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ArticleSeeder extends Seeder
{
    public function run(): void
    {
        // Artikel 1: Kategori Edukasi K3
        Article::create([
            'title' => 'Pentingnya Standar K3 Keamanan Perancah Tubuler pada Proyek Konstruksi',
            'slug' => Str::slug('Pentingnya Standar K3 Keamanan Perancah Tubuler pada Proyek Konstruksi'),
            'category' => 'edukasi-k3',
            'thumbnail' => 'articles/k3-scaffolding.jpg', // Path simulasi gambar
            'excerpt' => 'Keselamatan kerja merupakan prioritas utama dalam dunia konstruksi. Artikel ini membahas detail regulasi K3 khusus penggunaan scaffolding besi/tubuler untuk mencegah risiko kecelakaan kerja.',
            'body' => '<p>Penggunaan scaffolding atau perancah besi tubuler dalam proyek skala besar wajib mematuhi standar Keselamatan dan Kesehatan Kerja (K3)...</p>',
        ]);

        // Artikel 2: Kategori Proyek
        Article::create([
            'title' => 'Sukses Kolaborasi: Pemasangan Ringlock Scaffolding di Proyek Infrastruktur Surabaya',
            'slug' => Str::slug('Sukses Kolaborasi Pemasangan Ringlock Scaffolding di Proyek Infrastruktur Surabaya'),
            'category' => 'proyek',
            'thumbnail' => 'articles/proyek-surabaya.jpg',
            'excerpt' => 'Dua tim konstruksi berhasil menyelesaikan tahapan krusial pemasangan sistem scaffolding ringlock dengan efisiensi tinggi dan kepatuhan K3 yang sangat ketat.',
            'body' => '<p>Proyek pembangunan infrastruktur di pusat kota Surabaya mencatatkan performa gemilang...</p>',
        ]);

        // Artikel 3: Kategori Instalasi
        Article::create([
            'title' => 'Panduan Lengkap Cara Pemasangan Komponen Modular Scaffolding yang Aman',
            'slug' => Str::slug('Panduan Lengkap Cara Pemasangan Komponen Modular Scaffolding yang Aman'),
            'category' => 'instalasi',
            'thumbnail' => 'articles/instalasi-scaffolding.jpg',
            'excerpt' => 'Ingin tahu cara merakit perancah modular dengan benar? Ikuti langkah demi langkah instalasi base jack, ledgers, hingga guardrails berikut ini.',
            'body' => '<p>Proses instalasi modular scaffolding membutuhkan ketelitian pada setiap sambungan pipe dan pin...</p>',
        ]);
    }
}