<?php

namespace App\Livewire\Admin\Color;

use Livewire\Component;
use App\Exports\ColorExport as Export;
use Maatwebsite\Excel\Facades\Excel;

class ColorExport extends Component
{
    public function export()
    {
        $date = date('d-M-Y');
        return Excel::download(new Export, 'colors-'.$date.'.xlsx');
    }

    public function render()
    {
        return view('livewire.admin.color.color-export');
    }
}
