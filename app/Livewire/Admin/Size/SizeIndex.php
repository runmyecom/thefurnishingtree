<?php

namespace App\Livewire\Admin\Size;

use App\Models\Item;
use Livewire\Component;
use App\Models\ItemSize;
use App\Traits\WithSorting;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;

#[Layout('layouts.admin')]
class SizeIndex extends Component
{
    public function render()
    {
        return view('livewire.admin.size.size-index');
    }
}
