<?php

namespace App\Livewire\Admin\Category;

use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.admin')] 
class CategoryIndex extends Component
{
    public function render()
    {
        return view('livewire.admin.category.category-index');
    }
}
