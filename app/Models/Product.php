<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // <-- tambahkan ini
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory; // <-- dan tambahkan ini

    protected $fillable = [
        'sku',
        'name',
        'slug',
        'description',
        'price',
        'stock',
        'meta',
    ];

    protected $casts = [
        'meta' => 'array',
    ];
}
