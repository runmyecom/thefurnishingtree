<?php

namespace App\Livewire\Client;

use App\Models\Item;
use App\Models\Node;
use App\Models\Color;
use Livewire\Component;
use App\Models\Material;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
class ColorByMaterial extends Component
{
    public $node;
    public $brand;
    public $material;

    public function mount($type_name = null, $brand = null, $material = null)
    {
        $this->node = Node::where('type_name', $type_name)->firstOrFail();
        $this->brand = $brand;
        $this->$material = $material;
    }

    public
        $paginate = 10,
        $sortBy = 'items.id',
        $sortDirection = 'desc';

    public function render()
    {
        // $data = Color::where('material_id', $this->material->id)
        //     ->orderBy($this->sortBy, $this->sortDirection)
        //     ->paginate($this->paginate);

        $data = Item::where('material', str_replace('-', ' ', ucwords($this->material)))
            ->select('color')
            ->groupBy('color')
            ->get();

        return view('livewire.client.color-by-material', [
            'type_name' => $this->node->type_name,
            'brand' => $this->brand,
            'material' => $this->material,
            'colors' => $data
        ]);
    }
}
