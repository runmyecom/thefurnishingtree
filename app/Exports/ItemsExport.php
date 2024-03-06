<?php

namespace App\Exports;

use App\Models\Item;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class ItemsExport implements FromCollection, WithHeadings
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
            'item_height_unit',
            'item_width',
            'item_width_unit',
            'item_length',
            'item_length_unit',
            'item_weight',
            'item_weight_unit',

            'package_weight',
            'package_weight_unit',
            'package_length',
            'package_length_unit',
            'package_width',
            'package_width_unit',
            'package_height',
            'package_height_unit',

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
            'item_height_unit',
            'item_width',
            'item_width_unit',
            'item_length',
            'item_length_unit',
            'item_weight',
            'item_weight_unit',

            'package_weight',
            'package_weight_unit',
            'package_length',
            'package_length_unit',
            'package_width',
            'package_width_unit',
            'package_height',
            'package_height_unit',

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
