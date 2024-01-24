<?php

namespace App\Livewire\Admin\Size;

use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.admin')] 
class SizeIndex extends Component
{
    public function render()
    {
        return view('livewire.admin.size.size-index');
    }
}
