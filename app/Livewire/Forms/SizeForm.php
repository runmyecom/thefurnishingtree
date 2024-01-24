<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use App\Models\Size;
use Livewire\Attributes\Validate;

class SizeForm extends Form
{
    public ?size $size;

    #[Validate('required|min:3', as: 'Name')]
    public $name;

    public $slug;

    #[Validate('required')]
    public $color_id;

    public function setSize(Size $size){
        $this->size = $size;
        $this->name = $size->name;
        $this->slug = $size->slug;
        $this->color_id = $size->color_id;
    }

    public function store(){
        Size::create($this->except('size'));
        $this->reset();
    }

    public function update(){ 
        $this->size->update($this->except('size'));
    }
}
