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
                'item_height_unit' => $row[5],
                'item_width' => $row[6],
                'item_width_unit' => $row[7],
                'item_length' => $row[8],
                'item_length_unit' => $row[9],
                'item_weight' => $row[10],
                'item_weight_unit' => $row[11],

                'package_weight' => $row[12],
                'package_weight_unit' => $row[13],
                'package_length' => $row[14],
                'package_length_unit' => $row[15],
                'package_width' => $row[16],
                'package_width_unit' => $row[17],
                'package_height' => $row[18],
                'package_height_unit' => $row[19],

                'bullet_1' => $row[20],
                'bullet_2' => $row[21],
                'bullet_3' => $row[22],
                'bullet_4' => $row[23],
                'bullet_5' => $row[24],
                'bullet_6' => $row[25],
                'bullet_7' => $row[26],
                'bullet_8' => $row[27],
                'bullet_9' => $row[28],
                'bullet_10' => $row[29],
                'keyword' => $row[30],
                'image_1' => $row[31],
                'image_2' => $row[32],
                'image_3' => $row[33],
                'image_4' => $row[34],
                'image_5' => $row[35],
                'image_6' => $row[36],
                'selling_price' => $row[37],
                'mrp' => $row[38],
                'description' => $row[39],
                'is_featured' => $row[40],
                'brand' => $row[41],
                'material' => $row[42],
                'color' => $row[43],
                'node_id' => $row[44]
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
