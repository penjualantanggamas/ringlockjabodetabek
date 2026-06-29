<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    // Kolom-kolom ini disesuaikan dengan file migrasi baru Anda
    protected $fillable = [
        'name',
        'slug',
        'category',
        'size',
        'description',
        'specifications',
        'image',
        'stock_status',
        'is_active'
    ];
}