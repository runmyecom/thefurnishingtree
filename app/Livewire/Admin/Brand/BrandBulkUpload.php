<?php

namespace App\Livewire\Admin\Brand;

use Livewire\Component;
use App\Imports\BrandImport;
use Livewire\WithFileUploads;
use Livewire\Attributes\Layout;
use Maatwebsite\Excel\Facades\Excel;

#[Layout('layouts.admin')]
class BrandBulkUpload extends Component
{
    use WithFileUploads;

    public $sheet;

    public function import()
    {
        Excel::import(new BrandImport, $this->sheet);
        return back()->with('status', 'Sheet Imported');
    }

    public function render()
    {
        return view('livewire.admin.brand.brand-bulk-upload');
    }
}
