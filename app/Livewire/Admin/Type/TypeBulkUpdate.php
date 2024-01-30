<?php

namespace App\Livewire\Admin\Type;

use Livewire\Component;
use App\Imports\TypeUpdate;
use Livewire\WithFileUploads;
use Livewire\Attributes\Layout;
use Maatwebsite\Excel\Facades\Excel;

#[Layout('layouts.admin')]
class TypeBulkUpdate extends Component
{
    use WithFileUploads;

    public $sheet;

    public function import()
    {
        Excel::import(new TypeUpdate, $this->sheet);
        return back()->with('status', 'Sheet Updated');
    }

    public function render()
    {
        return view('livewire.admin.type.type-bulk-update');
    }
}
