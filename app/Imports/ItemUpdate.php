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
            $item->item_width = $row[5];
            $item->item_length = $row[6];
            $item->item_weight = $row[7];
            $item->package_weight = $row[8];
            $item->package_length = $row[9];
            $item->package_width = $row[10];
            $item->package_height = $row[11];
            $item->bullet_1 = $row[12];
            $item->bullet_2 = $row[13];
            $item->bullet_3 = $row[14];
            $item->bullet_4 = $row[15];
            $item->bullet_5 = $row[16];
            $item->bullet_6 = $row[17];
            $item->bullet_7 = $row[18];
            $item->bullet_8 = $row[19];
            $item->bullet_9 = $row[20];
            $item->bullet_10 = $row[21];
            $item->keyword = $row[22];
            $item->image_1 = $row[23];
            $item->image_2 = $row[24];
            $item->image_3 = $row[25];
            $item->image_4 = $row[26];
            $item->image_5 = $row[27];
            $item->selling_price = $row[28];
            $item->mrp = $row[29];
            $item->description = $row[30];
            $item->is_featured = $row[31];
            $item->model_id = $row[32];
            $item->brand = $row[33];
            $item->material = $row[34];
            $item->color = $row[35];
            $item->node_id = $row[36];
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
