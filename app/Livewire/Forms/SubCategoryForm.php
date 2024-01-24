<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use App\Models\Node;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Str;
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
        $sub = SubCategory::create($this->except('subcategory'));

        // Create New Node
        $node = new Node;
        $node->category_id = $sub->category_id;
        $cat = Category::where('id', $sub->category_id)->first();
        $node->category_name = $cat->name;

        $node->subcategory_id = $sub->id;
        $node->subcategory_name = $sub->name;

        $random = Str::random(5);
        $node->uuid = $random;

        $node->path = $cat->name.'>'.$sub->name;

        $node->save();
        
        $this->reset();
    }

    public function update(){ 
        $this->subcategory->update($this->except('subcategory'));
    }
}
