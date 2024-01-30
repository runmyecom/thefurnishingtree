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
            'slug',
            'size_id'
        ];
    }

    public function collection()
    {
        return ItemModel::select(
            'id',
            'name',
            'slug',
            'size_id'
        )->get();
    }
}
