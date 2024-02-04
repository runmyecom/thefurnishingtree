<?php

namespace App\Livewire\Client;

use App\Models\Item;
use App\Models\Node;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
class ModelBySize extends Component
{
    public $node;
    public $brand;
    public $material;
    public $color;
    public $size;

    public function mount($type_name = null, $brand = null, $material = null, $color = null, $size = null)
    {
        $this->node = Node::where('type_name', $type_name)->firstOrFail();
        $this->brand = $brand;
        $this->$material = $material;
        $this->$color = $color;
        $this->$size = $size;
    }

    public
        $paginate = 10,
        $sortBy = 'items.id',
        $sortDirection = 'desc';

    public function render()
    {
        // $data = ItemModel::where('size_id', $this->size->id)
        //     ->orderBy($this->sortBy, $this->sortDirection)
        //     ->paginate($this->paginate);
        $data = Item::where('size', str_replace('-', ' ', ucwords($this->size)))
            ->select('model')
            ->groupBy('model')
            ->get();

        return view('livewire.client.model-by-size', [
            'type_name' => $this->node->type_name,
            'brand' => $this->brand,
            'material' => $this->material,
            'color' => $this->color,
            'size' => $this->size,
            'models' => $data
        ]);
    }
}
