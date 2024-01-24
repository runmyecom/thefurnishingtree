<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use App\Models\Brand;
use Livewire\Attributes\Validate;

class BrandForm extends Form
{
    public ?brand $brand;

    #[Validate('required|min:3', as: 'Name')]
    public $name;

    #[Validate(as: 'Thumbnail')]
    public $thumbnail;
    public $slug;

    #[Validate('required', as: 'NodeId')]
    public $node_id;

    public function setBrand(Brand $brand){
        $this->brand = $brand;
        $this->name = $brand->name;
        $this->slug = $brand->slug;
        $this->thumbnail = $brand->thumbnail;
        $this->node_id = $brand->node_id;
    }

    public function store(){
        Brand::create($this->except('brand'));
        $this->reset();
    }

    public function update(){ 
        $this->brand->update($this->except('brand'));
    }
}
