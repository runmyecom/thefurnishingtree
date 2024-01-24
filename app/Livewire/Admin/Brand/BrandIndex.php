<?php

namespace App\Livewire\Admin\Brand;

use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.admin')] 
class BrandIndex extends Component
{
    public function render()
    {
        return view('livewire.admin.brand.brand-index');
    }
}
