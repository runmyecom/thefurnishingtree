<?php

namespace App\Imports;

use App\Models\Item;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Importable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\WithProgressBar;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class ItemUpdate implements ToCollection, WithStartRow, WithBatchInserts, WithChunkReading, ShouldQueue, WithProgressBar, SkipsEmptyRows
{
    use Importable;

    public function startRow(): int
    {
        return 2;
    }

    public function collection(Collection $rows)
    {
        foreach ($rows as $row){
            $item = Item::find($row[0]);

            $item->sku = $row[0];
            $item->item_name = $row[1];
            $item->slug = $row[2];
            $item->pattern = $row[3];

            $item->item_height = $row[4];
            $item->item_height_unit = $row[5];
            $item->item_width = $row[6];
            $item->item_width_unit = $row[7];
            $item->item_length = $row[8];
            $item->item_length_unit = $row[9];
            $item->item_weight = $row[10];
            $item->item_weight_unit = $row[11];

            $item->package_weight = $row[12];
            $item->package_weight_unit = $row[13];
            $item->package_length = $row[14];
            $item->package_length_unit = $row[15];
            $item->package_width = $row[16];
            $item->package_width_unit = $row[17];
            $item->package_height = $row[18];
            $item->package_height_unit = $row[19];

            $item->bullet_1 = $row[20];
            $item->bullet_2 = $row[21];
            $item->bullet_3 = $row[22];
            $item->bullet_4 = $row[23];
            $item->bullet_5 = $row[24];
            $item->bullet_6 = $row[25];
            $item->bullet_7 = $row[26];
            $item->bullet_8 = $row[27];
            $item->bullet_9 = $row[28];
            $item->bullet_10 = $row[29];

            $item->keyword = $row[30];

            $item->image_1 = $row[31];
            $item->image_2 = $row[32];
            $item->image_3 = $row[33];
            $item->image_4 = $row[34];
            $item->image_5 = $row[35];
            $item->image_6 = $row[36];

            $item->selling_price = $row[37];
            $item->mrp = $row[38];
            $item->description = $row[39];
            $item->is_featured = $row[40];

            $item->brand = $row[41];
            $item->material = $row[42];
            $item->color = $row[43];
            $item->size = $row[44];
            $item->model = $row[45];
            $item->node_id = $row[46];

            $item->save();
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
