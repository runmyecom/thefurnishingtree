<?php

namespace App\Livewire\Admin\Brand;

use Livewire\Component;
use App\Exports\BrandExport as Export;
use Maatwebsite\Excel\Facades\Excel;

class BrandExport extends Component
{

    public function export()
    {
        $date = date('d-M-Y');
        return Excel::download(new Export, 'brands-'.$date.'.xlsx');
    }

    public function render()
    {
        return view('livewire.admin.brand.brand-export');
    }
}
