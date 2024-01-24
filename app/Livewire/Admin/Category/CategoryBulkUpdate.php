<?php

namespace App\Livewire\Admin\Category;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Imports\CategoryUpdate;
use Livewire\Attributes\Layout;
use Maatwebsite\Excel\Facades\Excel;

#[Layout('layouts.admin')]
class CategoryBulkUpdate extends Component
{
    use WithFileUploads;

    public $sheet;

    public function import()
    {
        Excel::import(new CategoryUpdate, $this->sheet);
        return back()->with('status', 'Sheet Updated');
    }

    public function render()
    {
        return view('livewire.admin.category.category-bulk-update');
    }
}
