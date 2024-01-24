<?php

namespace App\Livewire\Admin\Item;

use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.admin')] 
class ItemIndex extends Component
{
    public function render()
    {
        return view('livewire.admin.item.item-index');
    }
}
