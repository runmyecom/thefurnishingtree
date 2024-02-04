<?php

namespace App\Imports;

use App\Models\Item;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\WithProgressBar;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class ItemImport implements ToModel, WithStartRow, WithBatchInserts, WithChunkReading, ShouldQueue, WithProgressBar, SkipsEmptyRows
{
    use Importable;

    public function startRow(): int
    {
        return 2;
    }

    public function model(array $row)
    {
        $data = Item::where('sku', $row[0])->first();

        if ($data) {
            return;
        } else {
            return new Item([
                'sku' => $row[0],
                'item_name' => $row[1],
                'slug' => $row[2],
                'pattern' => $row[3],
                'item_height' => $row[4],
                'item_width' => $row[5],
                'item_length' => $row[6],
                'item_weight' => $row[7],
                'package_weight' => $row[8],
                'package_length' => $row[9],
                'package_width' => $row[10],
                'package_height' => $row[11],
                'bullet_1' => $row[12],
                'bullet_2' => $row[13],
                'bullet_3' => $row[14],
                'bullet_4' => $row[15],
                'bullet_5' => $row[16],
                'bullet_6' => $row[17],
                'bullet_7' => $row[18],
                'bullet_8' => $row[19],
                'bullet_9' => $row[20],
                'bullet_10' => $row[21],
                'keyword' => $row[22],
                'image_1' => $row[23],
                'image_2' => $row[24],
                'image_3' => $row[25],
                'image_4' => $row[26],
                'image_5' => $row[27],
                'image_6' => $row[28],
                'selling_price' => $row[29],
                'mrp' => $row[30],
                'description' => $row[31],
                'is_featured' => $row[32],
                'brand' => $row[33],
                'material' => $row[34],
                'color' => $row[35],
                'size' => $row[36],
                'model' => $row[37],
                'node_id' => $row[38]
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
