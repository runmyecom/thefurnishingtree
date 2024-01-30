<?php

namespace App\Livewire\Admin\SubCategory;

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Layout;
use App\Imports\SubCategoryUpdate;
use Maatwebsite\Excel\Facades\Excel;

#[Layout('layouts.admin')]
class SubCategoryBulkUpdate extends Component
{
    use WithFileUploads;

    public $sheet;

    public function import()
    {
        Excel::import(new SubCategoryUpdate, $this->sheet);
        return back()->with('status', 'Sheet Updated');
    }

    public function render()
    {
        return view('livewire.admin.sub-category.sub-category-bulk-update');
    }
}
