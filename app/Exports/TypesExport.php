<?php

namespace App\Exports;

use App\Models\Type;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class TypesExport implements FromCollection, WithHeadings
{
    public function headings(): array
    {
        return [
            'id',
            'name',
            'slug',
            'thumbnail',
            'subcategory_id',
            'node_id'
        ];
    }

    public function collection()
    {
        return Type::select(
            'id',
            'name',
            'slug',
            'thumbnail',
            'subcategory_id',
        )->get();

    }
}
