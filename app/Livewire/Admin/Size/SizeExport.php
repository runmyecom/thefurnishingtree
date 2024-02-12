<?php

namespace App\Livewire\Admin\Size;

use App\Exports\SizesExport;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;

class SizeExport extends Component
{
    public function export()
    {
        $date = date('d-M-Y');
        return Excel::download(new SizesExport, 'item-sizes-'.$date.'.xlsx');
    }

    public function render()
    {
        return view('livewire.admin.size.size-export');
    }
}
