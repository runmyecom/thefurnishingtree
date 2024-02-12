<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use App\Models\ItemModel;
use Livewire\Attributes\Validate;

class ModelForm extends Form
{
    public ?itemmodel $itemmodel;

    #[Validate('required|min:3', as: 'Name')]
    public $name;

    #[Validate('required', as: 'SizeId')]
    public $size_id;

    public function setModel(ItemModel $itemmodel){
        $this->itemmodel = $itemmodel;
        $this->name = $itemmodel->name;
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
