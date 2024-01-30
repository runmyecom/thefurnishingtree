<?php

namespace App\Livewire\Admin\Color;

use Livewire\Component;
use App\Imports\ColorUpdate;
use Livewire\WithFileUploads;
use Livewire\Attributes\Layout;
use Maatwebsite\Excel\Facades\Excel;

#[Layout('layouts.admin')]
class ColorBulkUpdate extends Component
{
    use WithFileUploads;

    public $sheet;

    public function import()
    {
        Excel::import(new ColorUpdate, $this->sheet);
        return back()->with('status', 'Sheet Updated');
    }

    public function render()
    {
        return view('livewire.admin.color.bulk-update');
    }
}
