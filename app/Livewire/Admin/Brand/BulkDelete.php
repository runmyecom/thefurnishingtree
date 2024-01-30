<?php

namespace App\Livewire\Admin\Brand;

use Livewire\Component;
use App\Imports\BrandDelete;
use Livewire\WithFileUploads;
use Livewire\Attributes\Layout;
use Maatwebsite\Excel\Facades\Excel;

#[Layout('layouts.admin')]
class BulkDelete extends Component
{
    use WithFileUploads;

    public $sheet;

    public function import()
    {
        Excel::import(new BrandDelete, $this->sheet);
        return back()->with('status', 'Deleted');
    }

    public function render()
    {
        return view('livewire.admin.brand.bulk-delete');
    }
}
