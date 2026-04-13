<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category',
        'price',
        'price_quad',
        'price_triple',
        'price_double',
        'duration',
        'departure_date',
        'description',
        'features',
        'rundown',
        'stock',
        'status',
        'image',
        'guide_phone',
    ];

    protected function casts(): array
    {
        return [
            'features' => 'array',
            'rundown' => 'array',
            'price' => 'decimal:2',
            'price_quad' => 'decimal:2',
            'price_triple' => 'decimal:2',
            'price_double' => 'decimal:2',
            'departure_date' => 'date',
        ];
    }
}
