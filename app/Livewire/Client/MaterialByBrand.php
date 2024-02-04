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

    public function mount($type_name = null, $brand = null)
    {
        $this->node = Node::where('type_name', $type_name)->firstOrFail();
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

        $data = Item::where('brand', 'Godrej')
            ->select('material')
            ->groupBy('material')
            ->get();

        return view('livewire.client.material-by-brand', [
            'type_name' => $this->node->type_name,
            'brand' => $this->brand,
            'materials' => $data
        ]);
    }
}
