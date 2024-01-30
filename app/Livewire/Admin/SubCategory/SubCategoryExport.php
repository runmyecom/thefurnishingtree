<?php

namespace App\Livewire\Admin\SubCategory;

use Livewire\Component;
use App\Exports\SubCategoryExport as Export;
use Maatwebsite\Excel\Facades\Excel;

class SubCategoryExport extends Component
{
    public function render()
    {
        return view('livewire.admin.sub-category.sub-category-export');
    }

    public function export()
    {
        $date = date('d-M-Y');
        return Excel::download(new Export, 'sub-categories-'.$date.'.xlsx');
    }
}
