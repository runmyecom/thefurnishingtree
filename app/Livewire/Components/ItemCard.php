<?php

namespace App\Livewire\Components;

use Livewire\Component;

class ItemCard extends Component
{
    public $item;

    public function mount($item = null)
    {
        $this->item = $item;
    }
    public function render()
    {
        return view('livewire.components.item-card');
    }
}
