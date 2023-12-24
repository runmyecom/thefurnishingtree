<?php

namespace App\Livewire\Admin;

use App\Models\Product;
use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Livewire\Forms\ProductForm;

#[Layout('layouts.admin')] 
class CreateProduct extends Component{

    public ProductForm $form;

    public function render(){
        return view('livewire.admin.create-product');
    }

    public function save(){
        $this->form->store();
        return $this->redirect('products');
    }
}
