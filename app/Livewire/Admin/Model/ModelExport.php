<?php

namespace App\Livewire\Admin\Model;

use Livewire\Component;
use App\Exports\ModelExport as Export;
use Maatwebsite\Excel\Facades\Excel;

class ModelExport extends Component
{
    public function export()
    {
        $date = date('d-M-Y');
        return Excel::download(new Export, 'item-models-'.$date.'.xlsx');
    }

    public function render()
    {
        return view('livewire.admin.model.model-export');
    }
}
