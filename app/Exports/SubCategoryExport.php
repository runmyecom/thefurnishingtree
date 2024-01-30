<?php

namespace App\Exports;

use App\Models\SubCategory;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class SubCategoryExport implements FromCollection, WithHeadings
{

    public function headings(): array
    {
        return [
            'id',
            'name',
            'slug',
            'thumbnail',
            'category_id',
        ];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return SubCategory::select(
            'id',
            'name',
            'slug',
            'thumbnail',
            'category_id',
        )->get();
    }
}
