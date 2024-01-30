<?php

namespace App\Livewire\Admin\Material;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Imports\MaterialUpdate;
use Livewire\Attributes\Layout;
use Maatwebsite\Excel\Facades\Excel;

#[Layout('layouts.admin')]
class MaterialBulkUpdate extends Component
{
    use WithFileUploads;

    public $sheet;

    public function import()
    {
        Excel::import(new MaterialUpdate, $this->sheet);
        return back()->with('status', 'Sheet Updated');
    }

    public function render()
    {
        return view('livewire.admin.material.bulk-update');
    }
}
