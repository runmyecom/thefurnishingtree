<?php

namespace App\Livewire\Admin\SubCategory;

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Layout;
use App\Imports\SubCategoryDelete;
use Maatwebsite\Excel\Facades\Excel;

#[Layout('layouts.admin')]
class SubCategoryBulkDelete extends Component
{
    use WithFileUploads;

    public $sheet;

    public function import()
    {
        Excel::import(new SubCategoryDelete, $this->sheet);
        return back()->with('status', 'Deleted');
    }

    public function render()
    {
        return view('livewire.admin.sub-category.sub-category-bulk-delete');
    }
}
