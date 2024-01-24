<?php

namespace App\Livewire\Admin\Type;

use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.admin')] 
class TypeIndex extends Component
{
    public function render()
    {
        return view('livewire.admin.type.type-index');
    }
}
