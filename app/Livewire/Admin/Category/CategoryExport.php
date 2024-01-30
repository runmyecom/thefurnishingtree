<?php

namespace App\Livewire\Admin\Category;

use Livewire\Component;
use App\Exports\CategoryExport as Export;
use Maatwebsite\Excel\Facades\Excel;

class CategoryExport extends Component
{
    public function render()
    {
        return view('livewire.admin.category.category-export');
    }

    public function export()
    {
        $date = date('d-M-Y');
        return Excel::download(new Export, 'categories-'.$date.'.xlsx');
    }
}
