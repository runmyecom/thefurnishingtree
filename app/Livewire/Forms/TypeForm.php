<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use App\Models\Node;
use App\Models\Type;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use Livewire\Attributes\Validate;

class TypeForm extends Form
{
    public ?type $type;

    #[Validate('required|min:3', as: 'Name')]
    public $name;

    #[Validate(as: 'Thumbnail')]
    public $thumbnail;
    public $slug;

    #[Validate('required', as: 'Sub-Category')]
    public $subcategory_id;

    public function setType(Type $type){
        $this->type = $type;
        $this->name = $type->name;
        $this->slug = $type->slug;
        $this->subcategory_id = $type->subcategory_id;
        $this->thumbnail = $type->thumbnail;
    }

    public function store(){
        $type = Type::create($this->except('type'));

        $node = new Node;
        // Type ID - Name
        $node->type_id = $type->id;
        $node->type_name = $type->name;
        // Sub-Category ID - Name
        $node->subcategory_id = $type->subcategory_id;
        $sub_cat = SubCategory::where('category_id', $type->subcategory_id)->first();
        $node->subcategory_name = $sub_cat->name;
        // Category ID - Name
        $cat = Category::where('id', $sub_cat->category_id)->first();
        $node->category_id = $cat->id;
        $node->category_name = $cat->name;

        $random = Str::random(5);
        $node->uuid = $random;

        $node->path = $cat->name . '>' . $sub_cat->name . '>' . $type->name;

        $node->save();
        
        $this->reset();
    }

    public function update(){ 
        $this->type->update($this->except('type'));
    }
}
