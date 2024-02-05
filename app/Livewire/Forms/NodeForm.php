<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use App\Models\Node;
use Livewire\Attributes\Validate;

class NodeForm extends Form
{
    public ?node $node;

    public $uuid;
    public $category_name;
    public $subcategory_name;
    public $type_name;


    #[Validate('required')]
    public $category_id;

    #[Validate('required')]
    public $subcategory_id;

    public $type_id;

    public function setNode(Node $node){
        $this->node = $node;
        $this->uuid = $node->uuid;
        $this->category_id = $node->category_id;
        $this->category_name = $node->category_name;
        $this->subcategory_id = $node->subcategory_id;
        $this->subcategory_name = $node->subcategory_name;
        $this->type_id = $node->type_id;
        $this->type_name = $node->type_name;
    }

    public function store(){
        Node::create($this->except('node'));
        $this->reset();
    }

    public function update(){
        $this->node->update($this->except('node'));
    }
}
