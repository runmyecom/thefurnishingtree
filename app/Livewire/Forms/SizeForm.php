<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use App\Models\ItemSize;
use Livewire\Attributes\Validate;

class SizeForm extends Form
{
    public ?itemsize $itemsize;

    #[Validate('required|min:3', as: 'Name')]
    public $name;

    #[Validate('required', as: 'ItemId')]
    public $item_id;

    public function setSize(ItemSize $itemsize){
        $this->itemsize = $itemsize;
        $this->name = $itemsize->name;
        $this->item_id = $itemsize->item_id;
    }

    public function store(){
        ItemSize::create($this->except('itemsize'));
        $this->reset();
    }

    public function update(){
        $this->itemsize->update($this->except('itemsize'));
    }
}
