<?php

namespace Modules\Performance\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Performance extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'heading',
        'title',
        'description',
        'image'
    ];

    protected static function newFactory()
    {
        return \Modules\Performance\Database\factories\PerformanceFactory::new();
    }
}
