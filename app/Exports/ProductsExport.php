<?php

namespace App\Exports;

use App\Models\Item;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class ProductsExport implements FromCollection, WithHeadings
{
    public function headings(): array
    {
        return [
            '#',
            'name',
            'thumbnail',
            'dimension',
            'mrp',
            'selling_price',
            'description',
            'seo_keywords',
            'seo_description',
            'is_featured',
            'category_id'
        ];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Item::select(
            'id',
            'name',
            'thumbnail',
            'dimension',
            'mrp',
            'selling_price',
            'description',
            'seo_keywords',
            'seo_description',
            'is_featured',
            'category_id'
        )->get();
    }
}
