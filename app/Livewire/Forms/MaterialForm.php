<?php

namespace App\Livewire\Forms;

use App\Models\Material;
use Livewire\Attributes\Validate;
use Livewire\Form;

class MaterialForm extends Form
{
    public ?material $material;

    #[Validate('required|min:3', as: 'Name')]
    public $name;

    #[Validate(as: 'Thumbnail')]
    public $thumbnail;
    public $slug;

    #[Validate('required')]
    public $sub_category_id;

    public function setMaterial(Material $material){
        $this->material = $material;
        $this->name = $material->name;
        $this->slug = $material->slug;
        $this->sub_category_id = $material->sub_category_id;
        $this->thumbnail = $material->thumbnail;
    }

    public function store(){
        Material::create($this->except('material'));
        
        $this->reset();
    }

    public function update(){ 
        $this->material->update($this->except('material'));
    }
}
