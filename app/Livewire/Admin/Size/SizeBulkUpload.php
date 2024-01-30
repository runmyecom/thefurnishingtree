<?php

namespace App\Livewire\Admin\Size;

use Livewire\Component;
use App\Imports\SizeImport;
use Livewire\WithFileUploads;
use Livewire\Attributes\Layout;
use Maatwebsite\Excel\Facades\Excel;

#[Layout('layouts.admin')]
class SizeBulkUpload extends Component
{
    use WithFileUploads;

    public $sheet;

    public function import()
    {
        Excel::import(new SizeImport, $this->sheet);
        return back()->with('status', 'Sheet Imported');
    }

    public function render()
    {
        return view('livewire.admin.size.size-bulk-upload');
    }
}
