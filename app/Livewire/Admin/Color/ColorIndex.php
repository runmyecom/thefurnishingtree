<?php

namespace App\Livewire\Admin\Color;

use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.admin')] 
class ColorIndex extends Component
{
    public function render()
    {
        return view('livewire.admin.color.color-index');
    }
}
