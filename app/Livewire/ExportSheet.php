<?php

namespace App\Livewire;

use App\Exports\ProductsExport;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;

class ExportSheet extends Component
{
    public function export() 
    {
        return Excel::download(new ProductsExport, 'products.xlsx');
    }
    
    public function render()
    {
        return view('livewire.export-sheet');
    }
}
