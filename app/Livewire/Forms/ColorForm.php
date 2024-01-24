<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use App\Models\Color;
use Livewire\Attributes\Validate;

class ColorForm extends Form
{
    public ?color $color;

    #[Validate('required|min:3', as: 'Name')]
    public $name;

    public $slug;

    #[Validate('required')]
    public $material_id;

    public function setColor(Color $color){
        $this->color = $color;
        $this->name = $color->name;
        $this->slug = $color->slug;
        $this->material_id = $color->material_id;
    }

    public function store(){
        Color::create($this->except('color'));
        $this->reset();
    }

    public function update(){
        $this->color->update($this->except('color'));
    }
}
