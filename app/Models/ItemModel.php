<?php

namespace App\Models;

use App\Models\ItemSize;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ItemModel extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'name', 'size_id'];

    public function size(): BelongsTo
    {
        return $this->belongsTo(ItemSize::class);
    }
}
