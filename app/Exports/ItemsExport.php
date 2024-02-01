<?php

namespace App\Exports;

use App\Models\Item;
use Maatwebsite\Excel\Concerns\FromCollection;

class ItemsExport implements FromCollection
{
    public function headings(): array
    {
        return [
            'id',
            'sku',
            'item_name',
            'slug',
            'pattern',
            'item_height',
            'item_width',
            'item_length',
            'item_weight',
            'package_weight',
            'package_length',
            'package_width',
            'package_height',
            'bullet_1',
            'bullet_2',
            'bullet_3',
            'bullet_4',
            'bullet_5',
            'bullet_6',
            'bullet_7',
            'bullet_8',
            'bullet_9',
            'bullet_10',
            'keyword',
            'image_1',
            'image_2',
            'image_3',
            'image_4',
            'image_5',
            'selling_price',
            'mrp',
            'description',
            'is_featured',
            'brand',
            'material',
            'color',
            'size',
            'model',
            'node_id'
        ];
    }

    public function collection()
    {
        return Item::select(
            'id',
            'sku',
            'item_name',
            'slug',
            'pattern',
            'item_height',
            'item_width',
            'item_length',
            'item_weight',
            'package_weight',
            'package_length',
            'package_width',
            'package_height',
            'bullet_1',
            'bullet_2',
            'bullet_3',
            'bullet_4',
            'bullet_5',
            'bullet_6',
            'bullet_7',
            'bullet_8',
            'bullet_9',
            'bullet_10',
            'keyword',
            'image_1',
            'image_2',
            'image_3',
            'image_4',
            'image_5',
            'image_6',
            'selling_price',
            'mrp',
            'description',
            'is_featured',
            'brand',
            'material',
            'color',
            'size',
            'model',
            'node_id'
        )->get();
    }
}
