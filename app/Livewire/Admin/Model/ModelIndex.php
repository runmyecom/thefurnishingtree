<?php

namespace App\Livewire\Admin\Model;

use App\Models\Item;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.admin')]
class ModelIndex extends Component
{

    public function render()
    {
        return view('livewire.admin.model.model-index');
    }
}
