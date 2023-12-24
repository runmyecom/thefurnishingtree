<?php

namespace App\Livewire\Admin;

use App\Models\Product;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.admin')] 
class Products extends Component
{

    public $products = [];

    public function mount(){
        $this->products = Product::all();
    }

    public function render()
    {
        return view('livewire.admin.products');
    }
}
