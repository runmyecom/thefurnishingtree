<?php

namespace App\Imports;

use App\Models\Node;
use App\Models\Type;
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

class TypeImport implements ToModel, WithStartRow, WithBatchInserts, WithChunkReading, ShouldQueue, WithProgressBar, SkipsEmptyRows
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
        $data = Type::where('name', $row[0])->first();

        if ($data) {
            return;
        } else {
            $type = Type::create([
                'name' => $row[0],
                'slug' => $row[1],
                'thumbnail' => $row[2],
                'subcategory_id' => $row[3],
            ]);

            $node = new Node;
            // Type ID - Name
            $node->type_id = $type->id;
            $node->type_name = $type->name;
            // Sub-Category ID - Name
            $node->subcategory_id = $type->subcategory_id;
            $sub_cat = SubCategory::where('id', $type->subcategory_id)->first();
            $node->subcategory_name = $sub_cat->name;
            // Category ID - Name
            $cat = Category::where('id', $sub_cat->category_id)->first();
            $node->category_id = $cat->id;
            $node->category_name = $cat->name;

            $random = Str::random(5);
            $node->uuid = $random;

            $node->path = $cat->name . '>' . $sub_cat->name . '>' . $type->name;
            // dd($node);

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
