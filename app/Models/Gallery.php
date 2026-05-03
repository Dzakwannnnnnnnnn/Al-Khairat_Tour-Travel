<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = [
        'title',
        'description',
        'type',
        'image_path',
        'video_url',
        'is_active',
        'order',
    ];
}
