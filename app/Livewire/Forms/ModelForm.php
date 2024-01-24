<?php

namespace App\Livewire\Forms;

use App\Models\ItemModel;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ModelForm extends Form
{
    public ?itemmodel $itemmodel;

    #[Validate('required|min:3', as: 'Name')]
    public $name;

    public $slug;

    #[Validate('required')]
    public $size_id;

    public function setModel(ItemModel $itemmodel){
        $this->itemmodel = $itemmodel;
        $this->name = $itemmodel->name;
        $this->slug = $itemmodel->slug;
        $this->size_id = $itemmodel->size_id;
    }

    public function store(){
        ItemModel::create($this->except('itemmodel'));
        $this->reset();
    }

    public function update(){ 
        $this->itemmodel->update($this->except('itemmodel'));
    }
}
