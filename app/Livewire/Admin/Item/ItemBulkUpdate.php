<?php

namespace App\Livewire\Admin\Item;

use Livewire\Component;
use App\Imports\ItemUpdate;
use Livewire\WithFileUploads;
use Livewire\Attributes\Layout;
use Maatwebsite\Excel\Facades\Excel;

#[Layout('layouts.admin')]
class ItemBulkUpdate extends Component
{
    use WithFileUploads;

    public $sheet;

    public function import()
    {
        Excel::import(new ItemUpdate, $this->sheet);
        return back()->with('status', 'Sheet Updated');
    }

    public function render()
    {
        return view('livewire.admin.item.item-bulk-update');
    }
}
