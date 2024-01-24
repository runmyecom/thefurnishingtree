<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use App\Models\Order;
use Livewire\Attributes\Validate;

class OrderForm extends Form
{
    public ?order $order;

    #[Validate('required|min:3', as: 'Name')]
    public $name;

    #[Validate(as: 'Thumbnail')]
    public $thumbnail;
    public $slug;

    public function setorder(Order $order){
        $this->order = $order;
        $this->name = $order->name;
        $this->slug = $order->slug;
        $this->thumbnail = $order->thumbnail;
    }

    public function store(){
        Order::create($this->except('order'));
        $this->reset();
    }

    public function update(){
        $this->order->update($this->except('order'));
    }
}
