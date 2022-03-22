<?php

namespace Modules\About\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class About extends Model implements HasMedia
{
    use HasFactory,InteractsWithMedia;

    protected $fillable = [
        'title',
        'slug',
        'image',
        'description'
    ];

    protected static function newFactory()
    {
        return \Modules\About\Database\factories\AboutFactory::new();
    }
}
