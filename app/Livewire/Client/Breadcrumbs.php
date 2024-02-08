<?php

namespace App\Livewire\Client;

use Livewire\Component;

class Breadcrumbs extends Component
{
    public $type;
    public $brand;
    public $material;
    public $color;
    public $size;
    public $model;

    public function mount($type = null, $brand = null, $material = null, $color = null, $size = null, $model = null){
        $this->type = $type;
        $this->brand = $brand;
        $this->material = $material;
        $this->color = $color;
        $this->size = $size;
        $this->model = $model;
    }

    public function render()
    {
        return view('livewire.client.breadcrumbs');
    }
}
