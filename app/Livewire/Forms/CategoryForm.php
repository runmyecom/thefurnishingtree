<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use App\Models\Category;
use Livewire\Attributes\Validate;

class CategoryForm extends Form
{
    public ?category $category;

    #[Validate('required|min:3', as: 'Name')]
    public $name;

    #[Validate(as: 'Thumbnail')]
    public $thumbnail;
    public $slug;

    public function setCategory(Category $category){
        $this->category = $category;
        $this->name = $category->name;
        $this->slug = $category->slug;
        $this->thumbnail = $category->thumbnail;
    }

    public function store(){
        Category::create($this->except('category'));
        
        $this->reset();
    }

    public function update(){ 
        $this->category->update($this->except('category'));
    }

}
