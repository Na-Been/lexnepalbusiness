<?php

namespace Modules\Services\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Service extends Model implements HasMedia
{
    use HasFactory,InteractsWithMedia;

    protected $fillable = [
        'name', 'slug', 'image', 'description'
    ];

    protected static function newFactory()
    {
        return \Modules\Services\Database\factories\ServiceFactory::new();
    }
}
