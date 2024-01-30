<?php

namespace App\Livewire\Admin\Material;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Imports\MaterialDelete;
use Livewire\Attributes\Layout;
use Maatwebsite\Excel\Facades\Excel;

#[Layout('layouts.admin')]
class MaterialBulkDelete extends Component
{
    use WithFileUploads;

    public $sheet;

    public function import()
    {
        Excel::import(new MaterialDelete, $this->sheet);
        return back()->with('status', 'Deleted');
    }
    public function render()
    {
        return view('livewire.admin.material.bulk-delete');
    }
}
