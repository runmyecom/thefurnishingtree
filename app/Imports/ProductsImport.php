<?php

namespace App\Imports;

use App\Models\Item;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithProgressBar;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class ProductsImport implements ToModel, WithStartRow, WithBatchInserts, WithChunkReading, ShouldQueue, WithProgressBar
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
        return new Item([
            'sku' => $row[0],
            'item_name' => $row[1],
            'pattern' => $row[2],

            'item_weight' => $row[3],
            'item_height' => $row[4],
            'item_length' => $row[5],
            'item_width' => $row[6],

            'package_weight' => $row[7],
            'package_length' => $row[8],
            'package_width' => $row[9],
            'package_height' => $row[10],

            'bullet_1' => $row[11],
            'bullet_2' => $row[12],
            'bullet_3' => $row[13],
            'bullet_4' => $row[14],
            'bullet_5' => $row[15],
            'bullet_6' => $row[16],
            'bullet_7' => $row[17],
            'bullet_8' => $row[18],
            'bullet_9' => $row[19],
            'bullet_10' => $row[20],

            'keyword' => $row[21],

            'image_1' => $row[22],
            'image_2' => $row[23],
            'image_3' => $row[24],
            'image_4' => $row[25],
            'image_5' => $row[26],
            'image_6' => $row[27],

            'selling_price' => $row[28],
            'mrp' => $row[29],
            'description' => $row[30],

            'is_featured' => $row[31],

            'brand' => $row[32],
            'material' => $row[33],
            'color' => $row[34],
            'size' => $row[35],
            'model' => $row[36],
            'node_id' => $row[37],
        ]);
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
