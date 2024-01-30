<?php

namespace App\Imports;

use App\Models\Node;
use App\Models\Type;
use Illuminate\Support\Collection;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\WithProgressBar;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class TypeDelete implements ToCollection, WithBatchInserts, WithChunkReading, ShouldQueue, SkipsEmptyRows
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row)
        {
            // Type::destroy([
            //     'id' => $row[0]
            // ]);
            $type = Node::destroy($row[0]);

            $node = Node::where('type_id', $type)->first();
            Node::destroy($node->id);
            dd($node);

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
