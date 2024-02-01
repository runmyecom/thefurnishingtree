<?php

namespace App\Livewire\Admin\Item;

use Livewire\Component;
use App\Imports\ItemImport;
use Livewire\WithFileUploads;
use Livewire\Attributes\Layout;
use Maatwebsite\Excel\Facades\Excel;

#[Layout('layouts.admin')]
class ItemBulkUpload extends Component
{
    use WithFileUploads;

    public $sheet;

    public function import()
    {
        Excel::import(new ItemImport, $this->sheet);
        return back()->with('status', 'Sheet Imported');
    }

    public function render()
    {
        return view('livewire.admin.item.item-bulk-upload');
    }
}
