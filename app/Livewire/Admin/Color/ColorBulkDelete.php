<?php

namespace App\Livewire\Admin\Color;

use Livewire\Component;
use App\Imports\ColorDelete;
use Livewire\WithFileUploads;
use Livewire\Attributes\Layout;
use Maatwebsite\Excel\Facades\Excel;

#[Layout('layouts.admin')]
class ColorBulkDelete extends Component
{
    use WithFileUploads;

    public $sheet;

    public function import()
    {
        Excel::import(new ColorDelete, $this->sheet);
        return back()->with('status', 'Deleted');
    }

    public function render()
    {
        return view('livewire.admin.color.bulk-delete');
    }
}
