<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use App\Models\Item;
use Livewire\Attributes\Validate;

class ItemForm extends Form
{
    public ?item $item;

    #[Validate('required|min:3', as: 'Name')]
    public $item_name;

    #[Validate(as: 'Thumbnail')]
    public $thumbnail;
    public $slug;

    #[Validate('required')]
    public $model_id;

    public function setItem(Item $item){
        $this->item = $item;
        $this->item_name = $item->item_name;
        $this->slug = $item->slug;
        $this->model_id = $item->model_id;
        $this->thumbnail = $item->thumbnail;
    }

    public function store(){
        Item::create($this->except('item'));
        
        $this->reset();
    }

    public function update(){ 
        $this->item->update($this->except('item'));
    }
}
