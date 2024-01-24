<?php

namespace App\Models;

use App\Models\Size;
use App\Models\Material;
use App\Models\SubCategory;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Color extends Model
{
    use HasFactory, HasSlug;

    protected $guarded = [];

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function material(): BelongsTo
    {
        return $this->belongsTo(Material::class);
    }

    public function sizes(): HasMany
    {
        return $this->hasMany(Size::class);
    }
}
