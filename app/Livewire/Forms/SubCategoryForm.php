<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use App\Models\SubCategory;
use Livewire\Attributes\Validate;

class SubCategoryForm extends Form
{
    public ?subcategory $subcategory;

    #[Validate('required|min:3', as: 'Name')]
    public $name;

    #[Validate(as: 'Thumbnail')]
    public $thumbnail;
    public $slug;

    #[Validate('required', as: 'CategoryId')]
    public $category_id;

    public function setSubcategory(SubCategory $subcategory){
        $this->subcategory = $subcategory;
        $this->name = $subcategory->name;
        $this->slug = $subcategory->slug;
        $this->category_id = $subcategory->category_id;
        $this->thumbnail = $subcategory->thumbnail;
    }

    public function store(){
        SubCategory::create($this->except('subcategory'));
        
        $this->reset();
    }

    public function update(){ 
        $this->subcategory->update($this->except('subcategory'));
    }
}
