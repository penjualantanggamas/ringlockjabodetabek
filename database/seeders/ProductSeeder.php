<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product; // Pastikan buat model Product jika belum ada

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            // 1. Varian Ringlock Standard (Vertical)
            ['name' => 'Ringlock Standard', 'variant' => '0.5 m', 'price' => 81000, 'source_code' => 'vertical'],
            ['name' => 'Ringlock Standard', 'variant' => '1 m', 'price' => 126000, 'source_code' => 'vertical'],
            ['name' => 'Ringlock Standard', 'variant' => '1.5 m', 'price' => 171000, 'source_code' => 'vertical'],
            ['name' => 'Ringlock Standard', 'variant' => '2 m', 'price' => 216000, 'source_code' => 'vertical'],
            ['name' => 'Ringlock Standard', 'variant' => '2.5 m', 'price' => 268500, 'source_code' => 'vertical'],

            // 2. Varian Ringlock Ledger (Horizontal)
            ['name' => 'Ringlock Ledger', 'variant' => '0.9 m', 'price' => 76000, 'source_code' => 'ledger'],
            ['name' => 'Ringlock Ledger', 'variant' => '1.2 m', 'price' => 94000, 'source_code' => 'ledger'],
            ['name' => 'Ringlock Ledger', 'variant' => '1.5 m', 'price' => 113000, 'source_code' => 'ledger'],
            ['name' => 'Ringlock Ledger', 'variant' => '1.8 m', 'price' => 130500, 'source_code' => 'ledger'],

            // 3. Produk Lainnya (Dengan Varian Ukuran Spesifik)
            ['name' => 'Diagonal Brace', 'variant' => 'Diagonal 0.9×1.5 m', 'price' => 126000, 'source_code' => 'other'],
            ['name' => 'Diagonal Brace', 'variant' => 'Diagonal 1.2×1.5 m', 'price' => 133000, 'source_code' => 'other'],
            ['name' => 'Diagonal Brace', 'variant' => 'Diagonal 1.5×1.5 m', 'price' => 145500, 'source_code' => 'other'],
            ['name' => 'Diagonal Brace', 'variant' => 'Diagonal 1.8×1.5 m', 'price' => 150500, 'source_code' => 'other'],

            ['name' => 'Ringlock Catwalk', 'variant' => 'Catwalk 0.9 m', 'price' => 155000, 'source_code' => 'other'],
            ['name' => 'Ringlock Catwalk', 'variant' => 'Catwalk 1.2 m', 'price' => 175000, 'source_code' => 'other'],
            ['name' => 'Ringlock Catwalk', 'variant' => 'Catwalk 1.5 m', 'price' => 195000, 'source_code' => 'other'],
            ['name' => 'Ringlock Catwalk', 'variant' => 'Catwalk 1.8 m', 'price' => 225000, 'source_code' => 'other'],

            // 4. Produk Aksesoris (Tanpa Varian)
            ['name' => 'Ringlock Ringself', 'variant' => null, 'price' => 14000, 'source_code' => 'other'],
            ['name' => 'Jackbase M38', 'variant' => null, 'price' => 91000, 'source_code' => 'other'],
            ['name' => 'Uhead M38', 'variant' => null, 'price' => 96000, 'source_code' => 'other'],
            ['name' => 'Ringlock Wedge', 'variant' => null, 'price' => 5000, 'source_code' => 'other'],
            ['name' => 'Ringlock Stair', 'variant' => null, 'price' => 1730000, 'source_code' => 'other'],
            ['name' => 'Ringlock Diagonal Brace Head', 'variant' => null, 'price' => 16000, 'source_code' => 'other'],
            ['name' => 'Ringlock Ledger Head', 'variant' => null, 'price' => 11000, 'source_code' => 'other'],
        ];

        foreach ($data as $item) {
            \DB::table('products')->insert($item);
        }
    }
}