<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slideshow extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'image_url',
        'local_path',
        'order',
        'is_active',
        'description',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
            'order' => 'integer',
        ];
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (!$model->order) {
                $model->order = (static::max('order') ?? 0) + 1;
            }
        });
    }
}
