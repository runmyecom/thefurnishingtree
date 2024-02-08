<?php

namespace App\Livewire\Client;

use App\Models\Item;
use App\Models\Node;
use App\Models\Brand;
use Livewire\Component;
use App\Models\Material;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
class MaterialByBrand extends Component
{
    public $node;
    public $brand;

    public function mount($type = null, $brand = null)
    {
        $this->node = Node::where('type_name', $type)->firstOrFail();
        $this->brand = $brand;
    }

    public
        $paginate = 10,
        $sortBy = 'items.id',
        $sortDirection = 'desc';

    public function render()
    {
        // $data = Material::where('brand_id', $this->brand->id)
        //     ->orderBy($this->sortBy, $this->sortDirection)
        //     ->paginate($this->paginate);

        $data = Item::where('brand', str_replace('-', ' ', ucwords($this->brand)))
            ->where('node_id', $this->node->id)
            ->select('material', 'image_1')
            ->groupBy('material', 'image_1')
            ->get();

        return view('livewire.client.material-by-brand', [
            'type' => $this->node->type_name,
            'brand' => $this->brand,
            'materials' => $data
        ]);
    }
}
