<?php

namespace App\Livewire\Admin\Material;

use Livewire\Component;
use App\Exports\MaterialExport as Export;
use Maatwebsite\Excel\Facades\Excel;

class MaterialExport extends Component
{
    public function export()
    {
        $date = date('d-M-Y');
        return Excel::download(new Export, 'materials-'.$date.'.xlsx');
    }

    public function render()
    {
        return view('livewire.admin.material.material-export');
    }
}
