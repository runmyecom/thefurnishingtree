<?php

namespace App\Models;

use App\Models\ItemModel;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Item extends Model
{
    use HasFactory, HasSlug;
    protected $guarded = [];

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('item_name')
            ->saveSlugsTo('slug');
    }

    public function model(): BelongsTo
    {
        return $this->belongsTo(ItemModel::class);
    }
    
}
