<?php

namespace App\Imports;

use App\Models\Size;
use Illuminate\Support\Collection;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\WithProgressBar;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class SizeDelete implements ToCollection, WithBatchInserts, WithChunkReading, ShouldQueue, SkipsEmptyRows
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row)
        {
            Size::destroy([
                'id' => $row[0]
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
