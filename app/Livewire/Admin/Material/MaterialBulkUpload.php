<?php

namespace App\Livewire\Admin\Material;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Imports\MaterialImport;
use Livewire\Attributes\Layout;
use Maatwebsite\Excel\Facades\Excel;

#[Layout('layouts.admin')]
class MaterialBulkUpload extends Component
{
    use WithFileUploads;

    public $sheet;

    public function import()
    {
        Excel::import(new MaterialImport, $this->sheet);
        return back()->with('status', 'Sheet Imported');
    }

    public function render()
    {
        return view('livewire.admin.material.material-bulk-upload');
    }
}
