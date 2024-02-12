<?php

namespace App\Models;

use App\Models\Item;
use App\Models\ItemModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ItemSize extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'name', 'item_id'];

    public function item(): BelongsTo
    {
        return $this->belongsTo(Item::class)->select('id');
    }

    public function itemmodels(): HasMany
    {
        return $this->hasMany(ItemModel::class);
    }

}
