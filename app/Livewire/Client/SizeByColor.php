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

    public function mount($type_name = null, $brand = null, $material = null, $color = null)
    {
        $this->node = Node::where('type_name', $type_name)->firstOrFail();
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
            ->select('size')
            ->groupBy('size')
            ->get();

        return view('livewire.client.size-by-color', [
            'type_name' => $this->node->type_name,
            'brand' => $this->brand,
            'material' => $this->material,
            'color' => $this->color,
            'sizes' => $data
        ]);
    }
}
