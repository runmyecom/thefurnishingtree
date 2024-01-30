<?php

namespace App\Imports;

use App\Models\Node;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\WithProgressBar;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class SubCategoryImport implements ToModel, WithStartRow, WithBatchInserts, WithChunkReading, ShouldQueue, WithProgressBar, SkipsEmptyRows
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
        $data = SubCategory::where('name', $row[0])->first();

        if ($data) {
            return;
        } else {
            $sub = SubCategory::create([
                'name' => $row[0],
                'slug' => $row[1],
                'thumbnail' => $row[2],
                'category_id' => $row[3],
            ]);

            // Create New Node
            $node = new Node;
            $node->category_id = $sub->category_id;
            $cat = Category::where('id', $sub->category_id)->first();
            $node->category_name = $cat->name;

            $node->subcategory_id = $sub->id;
            $node->subcategory_name = $sub->name;

            $random = Str::random(5);
            $node->uuid = $random;

            $node->path = $cat->name.'>'.$sub->name;

            $node->save();
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
