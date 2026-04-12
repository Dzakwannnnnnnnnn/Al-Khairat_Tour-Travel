<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Guide extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected function casts(): array
    {
        return [
            'key_points' => 'array',
            'sections' => 'array',
            'tips' => 'array',
            'is_active' => 'boolean',
            'order' => 'integer',
        ];
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (!$model->order) {
                $model->order = (static::where('category', $model->category)->max('order') ?? 0) + 1;
            }
        });
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeByCategory($query, $category)
    {
        return $query->where('category', $category);
    }
}
