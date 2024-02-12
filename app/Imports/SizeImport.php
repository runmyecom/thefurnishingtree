<?php

namespace App\Imports;

use App\Models\ItemSize;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\WithProgressBar;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class SizeImport implements ToModel, WithStartRow, WithBatchInserts, WithChunkReading, ShouldQueue, WithProgressBar, SkipsEmptyRows
{
    use Importable;

    public function startRow(): int
    {
        return 2;
    }

    public function model(array $row)
    {
        $data = ItemSize::where('name', $row[0])->first();

        if ($data) {
            return;
        } else {
            return new ItemSize([
                'name' => $row[0],
                'item_id' => $row[1]
            ]);
        }
    }

    public function batchSize(): int
    {
        return 1000;
    }
    public function chunkSize(): int
    {
        return 1000;
    }

}
