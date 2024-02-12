<?php

namespace App\Livewire\Admin\Size;

use Livewire\Component;
use App\Imports\SizeDelete;
use Livewire\WithFileUploads;
use Livewire\Attributes\Layout;
use Maatwebsite\Excel\Facades\Excel;

#[Layout('layouts.admin')]
class SizeBulkDelete extends Component
{
    use WithFileUploads;

    public $sheet;

    public function import()
    {
        Excel::import(new SizeDelete, $this->sheet);
        return back()->with('status', 'Deleted');
    }


    public function render()
    {
        return view('livewire.admin.size.size-bulk-delete');
    }
}
