<?php

namespace App\Exports;

use App\Models\ItemModel;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class ModelExport implements FromCollection, WithHeadings
{
    public function headings(): array
    {
        return [
            'id',
            'name',
            'size_id'
        ];
    }

    public function collection()
    {
        return ItemModel::select(
            'id',
            'name',
            'size_id'
        )->get();
    }
}
