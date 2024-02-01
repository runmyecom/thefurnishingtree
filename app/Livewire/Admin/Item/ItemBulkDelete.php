<?php

namespace App\Livewire\Admin\Item;

use Livewire\Component;
use App\Imports\ItemDelete;
use Livewire\WithFileUploads;
use Livewire\Attributes\Layout;
use Maatwebsite\Excel\Facades\Excel;

#[Layout('layouts.admin')]
class ItemBulkDelete extends Component
{
    use WithFileUploads;

    public $sheet;

    public function import()
    {
        Excel::import(new ItemDelete, $this->sheet);
        return back()->with('status', 'Deleted');
    }

    public function render()
    {
        return view('livewire.admin.item.item-bulk-delete');
    }
}
