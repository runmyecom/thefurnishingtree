<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Imports\ProductsImport;
use Livewire\Attributes\Layout;
use Maatwebsite\Excel\Facades\Excel;

#[Layout('layouts.admin')]
class ImportSheet extends Component
{
    use WithFileUploads;

    public $sheet;

    public function import()
    {
        // sleep(5);
        Excel::import(new ProductsImport, $this->sheet);
        return back()->with('status', 'Sheet Imported');
    }

    public function render()
    {
        return view('livewire.import-sheet');
    }
}
