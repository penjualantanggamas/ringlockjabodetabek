<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'title',
        'prefix',
        'slug',
        'category',
        'thumbnail',
        'excerpt',
        'body',
        'faqs',
        'meta_title',
        'meta_author',
        'meta_keywords',
        'meta_description',
    ];

    protected $casts = [
        'faqs' => 'array',
    ];
}