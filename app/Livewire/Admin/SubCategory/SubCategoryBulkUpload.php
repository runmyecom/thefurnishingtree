<?php

namespace App\Livewire\Admin\SubCategory;

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Layout;
use App\Imports\SubCategoryImport;
use Maatwebsite\Excel\Facades\Excel;

#[Layout('layouts.admin')]
class SubCategoryBulkUpload extends Component
{
    use WithFileUploads;
    public $sheet;

    public function import()
    {
        Excel::import(new SubCategoryImport, $this->sheet);
        return back()->with('status', 'Sheet Imported');
    }

    public function render()
    {
        return view('livewire.admin.sub-category.sub-category-bulk-upload');
    }
}
