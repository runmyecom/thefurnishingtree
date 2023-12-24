<?php

namespace App\Livewire\Admin\SubCategory;

use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.admin')] 
class SubIndex extends Component
{
    public function render()
    {
        return view('livewire.admin.sub-category.sub-index');
    }
}
