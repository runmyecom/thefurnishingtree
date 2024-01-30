<?php

namespace App\Livewire\Admin\Type;

use Livewire\Component;
use App\Exports\TypesExport;
use Maatwebsite\Excel\Facades\Excel;

class TypeExport extends Component
{
    public function export()
    {
        $date = date('d-M-Y');
        return Excel::download(new TypesExport, 'types-'.$date.'.xlsx');
    }
    public function render()
    {
        return view('livewire.admin.type.type-export');
    }
}
