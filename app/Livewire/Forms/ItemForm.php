<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use App\Models\Item;
use Livewire\Attributes\Validate;

class ItemForm extends Form
{
    public ?item $item;

    public $sku;
    public $item_name;
    public $slug;
    public $node_id;
    public $brand;
    public $material;
    public $color;
    public $size;
    public $model;

    public function setItem(Item $item){
        $this->item = $item;
        $this->sku = $item->sku;
        $this->item_name = $item->item_name;
        $this->slug = $item->slug;
        $this->node_id = $item->node_id;
        $this->brand = $item->brand;
        $this->material = $item->material;
        $this->color = $item->color;
        $this->size = $item->size;
        $this->model = $item->model;
    }

    public function store(){
        Item::create($this->except('item'));

        $this->reset();
    }

    public function update(){
        $this->item->update($this->except('item'));
    }
}
