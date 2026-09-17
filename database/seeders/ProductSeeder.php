<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->truncate();

        $products = [
            // 1. Ringlock Standard
            ['name' => 'Ringlock Standard', 'variant' => '0.5 m', 'price' => 45000],
            ['name' => 'Ringlock Standard', 'variant' => '1 m', 'price' => 65000],
            ['name' => 'Ringlock Standard', 'variant' => '1.5 m', 'price' => 81000],
            ['name' => 'Ringlock Standard', 'variant' => '2 m', 'price' => 110000],
            ['name' => 'Ringlock Standard', 'variant' => '2.5 m', 'price' => 135000],

            // 2. Ringlock Ledger
            ['name' => 'Ringlock Ledger', 'variant' => '0.9 m', 'price' => 35000],
            ['name' => 'Ringlock Ledger', 'variant' => '1.2 m', 'price' => 48000],
            ['name' => 'Ringlock Ledger', 'variant' => '1.5 m', 'price' => 55000],
            ['name' => 'Ringlock Ledger', 'variant' => '1.8 m', 'price' => 70000],

            // 3. Diagonal Brace
            ['name' => 'Diagonal Brace', 'variant' => 'Diagonal 0.9×1.5 m', 'price' => 95000],
            ['name' => 'Diagonal Brace', 'variant' => 'Diagonal 1.2×1.5 m', 'price' => 110000],
            ['name' => 'Diagonal Brace', 'variant' => 'Diagonal 1.5×1.5 m', 'price' => 125000],
            ['name' => 'Diagonal Brace', 'variant' => 'Diagonal 1.8×1.5 m', 'price' => 140000],

            // 4. Ringlock Catwalk
            ['name' => 'Ringlock Catwalk', 'variant' => 'Catwalk 0.9 m', 'price' => 150000],
            ['name' => 'Ringlock Catwalk', 'variant' => 'Catwalk 1.2 m', 'price' => 185000],
            ['name' => 'Ringlock Catwalk', 'variant' => 'Catwalk 1.5 m', 'price' => 210000],
            ['name' => 'Ringlock Catwalk', 'variant' => 'Catwalk 1.8 m', 'price' => 245000],

            // FIX UTAMA: Produk tanpa varian dikosongkan ("") agar sinkron dengan Cart storage
            ['name' => 'Ringlock Ringself', 'variant' => '', 'price' => 25000],
            ['name' => 'Jackbase M38', 'variant' => '', 'price' => 85000],
            ['name' => 'Uhead M38', 'variant' => '', 'price' => 90000],
            ['name' => 'Ringlock Wedge', 'variant' => '', 'price' => 12000],
            ['name' => 'Ringlock Stair', 'variant' => '', 'price' => 450000],
            ['name' => 'Ringlock Diagonal Brace Head', 'variant' => '', 'price' => 15000],
            ['name' => 'Ringlock Ledger Head', 'variant' => '', 'price' => 15000],
        ];

        DB::table('products')->insert($products);
    }
}