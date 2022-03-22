<?php

namespace Modules\Offers\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Offer extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'name',
        'image',
        'highlight_text' ,
        'slug',
        'description'
    ];

    protected static function newFactory()
    {
        return \Modules\Offers\Database\factories\OfferFactory::new();
    }
}
