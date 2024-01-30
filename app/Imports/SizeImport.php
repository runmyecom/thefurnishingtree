<?php

namespace App\Imports;

use App\Models\Size;
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


    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $data = Size::where('name', $row[0])->first();

        if ($data) {
            return;
        } else {
            return new Size([
                'name' => $row[0],
                'slug' => $row[1],
                'color_id' => $row[2],
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
