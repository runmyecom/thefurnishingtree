<?php

namespace App\Exports;

use App\Models\Brand;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class BrandExport implements FromCollection, WithHeadings
{
    public function headings(): array
    {
        return [
            'id',
            'name',
            'slug',
            'thumbnail',
            'node_id'
        ];
    }

    public function collection()
    {
        return Brand::select(
            'id',
            'name',
            'slug',
            'thumbnail',
            'node_id'
        )->get();
    }
}
