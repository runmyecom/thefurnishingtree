<?php

namespace App\Livewire\Admin\Item;

use Livewire\Component;
use App\Exports\ItemsExport;
use Maatwebsite\Excel\Facades\Excel;

class ItemExport extends Component
{
    public function export()
    {
        $date = date('d-M-Y');
        return Excel::download(new ItemsExport, 'items-'.$date.'.xlsx');
    }

    public function render()
    {
        return view('livewire.admin.item.item-export');
    }
}
