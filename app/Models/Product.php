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
        'duration',
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
        ];
    }
}
