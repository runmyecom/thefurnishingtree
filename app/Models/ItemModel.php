<?php

namespace App\Models;

use App\Models\Item;
use App\Models\Size;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ItemModel extends Model
{
    use HasFactory, HasSlug;

    protected $guarded = [];

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function size(): BelongsTo
    {
        return $this->belongsTo(Size::class);
    }

    public function items(): HasMany
    {
        return $this->hasMany(Item::class);
    }
}
