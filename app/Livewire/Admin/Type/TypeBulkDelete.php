<?php

namespace App\Livewire\Admin\Type;

use Livewire\Component;
use App\Imports\TypeDelete;
use Livewire\WithFileUploads;
use Livewire\Attributes\Layout;
use Maatwebsite\Excel\Facades\Excel;

#[Layout('layouts.admin')]
class TypeBulkDelete extends Component
{
    use WithFileUploads;

    public $sheet;

    public function import()
    {
        Excel::import(new TypeDelete, $this->sheet);
        return back()->with('status', 'Deleted');
    }

    public function render()
    {
        return view('livewire.admin.type.type-bulk-delete');
    }
}
