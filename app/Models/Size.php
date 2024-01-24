<?php

namespace App\Models;

use App\Models\Color;
use App\Models\Itemmodel;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Size extends Model
{
    use HasFactory, HasSlug;

    protected $guarded = [];

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function color(): BelongsTo
    {
        return $this->belongsTo(Color::class);
    }

    public function models(): HasMany
    {
        return $this->hasMany(Itemmodel::class);
    }
}
