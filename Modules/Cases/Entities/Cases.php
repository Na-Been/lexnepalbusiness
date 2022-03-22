<?php

namespace Modules\Cases\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Cases extends Model implements HasMedia
{
    use HasFactory,InteractsWithMedia;

    protected $table = 'cases';
    protected $fillable = [
        'case_name', 'slug', 'category_id', 'image', 'defence_by', 'crime', 'criminal_name', 'description'
    ];

    protected static function newFactory()
    {
        return \Modules\Cases\Database\factories\CasesFactory::new();
    }

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }
}
