<?php

namespace App\Livewire\Admin\Category;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Imports\CategoryImport;
use Livewire\Attributes\Layout;
use Maatwebsite\Excel\Facades\Excel;

#[Layout('layouts.admin')]
class CategoryBulk extends Component
{
    use WithFileUploads;

    public $sheet;

    public function import()
    {
        Excel::import(new CategoryImport, $this->sheet);
        return back()->with('status', 'Sheet Imported');
    }

    public function render()
    {
        return view('livewire.admin.category.category-bulk');
    }
}
