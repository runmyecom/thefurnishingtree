<?php

namespace App\Exports;

use App\Models\Color;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class ColorExport implements FromCollection, WithHeadings
{
    public function headings(): array
    {
        return [
            'id',
            'name',
            'slug',
            'material_id'
        ];
    }

    public function collection()
    {
        return Color::select(
            'id',
            'name',
            'slug',
            'material_id'
        )->get();
    }
}
