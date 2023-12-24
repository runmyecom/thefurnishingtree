<?php

namespace App\Livewire\Admin\Material;

use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.admin')] 
class MaterialIndex extends Component
{
    public function render()
    {
        return view('livewire.admin.material.material-index');
    }
}
