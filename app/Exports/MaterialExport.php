<?php

namespace App\Exports;

use App\Models\Material;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class MaterialExport implements FromCollection, WithHeadings
{
    public function headings(): array
    {
        return [
            'id',
            'name',
            'slug',
            'thumbnail',
            'brand_id',
        ];
    }

public function collection()
    {
        return Material::select(
            'id',
            'name',
            'slug',
            'thumbnail',
            'brand_id',
        )->get();
    }
}
