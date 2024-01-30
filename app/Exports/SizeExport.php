<?php

namespace App\Exports;

use App\Models\Size;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class SizeExport implements FromCollection, WithHeadings
{
    public function headings(): array
    {
        return [
            'id',
            'name',
            'slug',
            'color_id'
        ];
    }

    public function collection()
    {
        return Size::select(
            'id',
            'name',
            'slug',
            'color_id'
        )->get();
    }
}
