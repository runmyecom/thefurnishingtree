<?php

namespace App\Exports;

use App\Models\ItemSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class SizesExport implements FromCollection, WithHeadings
{
    public function headings(): array
    {
        return [
            'id',
            'name',
            'item_id'
        ];
    }

    public function collection()
    {
        return ItemSize::select(
            'id',
            'name',
            'item_id'
        )->get();
    }
}
