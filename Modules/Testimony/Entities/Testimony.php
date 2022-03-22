<?php

namespace Modules\Testimony\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Testimony extends Model implements HasMedia
{
    use HasFactory,InteractsWithMedia;

    protected $fillable = [
        'name',
        'description',
        'image'
    ];

    protected static function newFactory()
    {
        return \Modules\Testimony\Database\factories\TestimonyFactory::new();
    }
}
