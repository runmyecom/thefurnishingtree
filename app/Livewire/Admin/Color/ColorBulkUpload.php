<?php

namespace App\Livewire\Admin\Color;

use Livewire\Component;
use App\Imports\ColorImport;
use Livewire\WithFileUploads;
use Livewire\Attributes\Layout;
use Maatwebsite\Excel\Facades\Excel;

#[Layout('layouts.admin')]
class ColorBulkUpload extends Component
{
    use WithFileUploads;

    public $sheet;

    public function import()
    {
        Excel::import(new ColorImport, $this->sheet);
        return back()->with('status', 'Sheet Imported');
    }

    public function render()
    {
        return view('livewire.admin.color.color-bulk-upload');
    }
}
