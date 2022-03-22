<?php

namespace Modules\Cases\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'slug'
    ];

    protected static function newFactory()
    {
        return \Modules\Cases\Database\factories\CategoryFactory::new();
    }

    public function cases()
    {
        return $this->hasMany(Cases::class);
    }
}
