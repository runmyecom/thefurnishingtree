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
    public $brand_id;

    public function setMaterial(Material $material){
        $this->material = $material;
        $this->name = $material->name;
        $this->slug = $material->slug;
        $this->thumbnail = $material->thumbnail;
        $this->brand_id = $material->brand_id;
    }

    public function store(){
        Material::create($this->except('material'));
        
        $this->reset();
    }

    public function update(){ 
        $this->material->update($this->except('material'));
    }
}
