<?php

namespace App\Livewire\Client;

use App\Models\Item;
use App\Models\Node;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
class SizeByColor extends Component
{
    public $node;
    public $brand;
    public $material;
    public $color;

    public function mount($type = null, $brand = null, $material = null, $color = null)
    {
        $this->node = Node::where('type_name', $type)->firstOrFail();
        $this->brand = $brand;
        $this->$material = $material;
        $this->$color = $color;
    }

    public
        $paginate = 10,
        $sortBy = 'items.id',
        $sortDirection = 'desc';

    public function render()
    {
        // $data = Size::where('color_id', $this->color->id)
        //     ->orderBy($this->sortBy, $this->sortDirection)
        //     ->paginate($this->paginate);
        $data = Item::where('color', str_replace('-', ' ', ucwords($this->color)))
            ->where('material', str_replace('-', ' ', ucwords($this->material)))
            ->where('brand', str_replace('-', ' ', ucwords($this->brand)))
            ->where('node_id', $this->node->id)
            ->select('size', 'image_1')
            ->groupBy('size', 'image_1')
            ->get();

        return view('livewire.client.size-by-color', [
            'type' => $this->node->type_name,
            'brand' => $this->brand,
            'material' => $this->material,
            'color' => $this->color,
            'sizes' => $data
        ]);
    }
}
