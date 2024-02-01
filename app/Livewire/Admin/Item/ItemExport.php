<?php

namespace App\Livewire\Admin\Item;

use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;
use App\Livewire\Admin\Item\ItemExport as Export;

class ItemExport extends Component
{
    public function export()
    {
        $date = date('d-M-Y');
        return Excel::download(new Export, 'items-'.$date.'.xlsx');
    }

    public function render()
    {
        return view('livewire.admin.item.item-export');
    }
}
