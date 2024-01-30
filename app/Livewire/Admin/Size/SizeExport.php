<?php

namespace App\Livewire\Admin\Size;

use Livewire\Component;
use App\Exports\SizeExport as Export;
use Maatwebsite\Excel\Facades\Excel;

class SizeExport extends Component
{
    public function export()
    {
		$date = date('d-M-Y');
        return Excel::download(new Export, 'sizes-'.$date.'.xlsx');
    }

    public function render()
    {
        return view('livewire.admin.size.size-export');
    }
}
