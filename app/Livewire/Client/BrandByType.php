<?php

namespace App\Livewire\Client;

use App\Models\Item;
use App\Models\Node;
use App\Models\Type;
use App\Models\Brand;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.guest')]
class BrandByType extends Component
{
    public $type;
    public $node;

    public function mount($id)
    {
        $this->type = Type::find($id);
    }

    public
        $paginate = 40,
        $sortBy = 'items.id',
        $sortDirection = 'desc';

    public function render()
    {
        $this->node = Node::where('type_id', $this->type->id)->first();

        // $data = Brand::where('node_id', $this->node->id)
        //     ->orderBy($this->sortBy, $this->sortDirection)
        //     ->paginate($this->paginate);

        $data = Item::where('node_id', $this->node->id)
            ->select('brand')
            ->groupBy('brand')
            ->get();

        return view('livewire.client.brand-by-type', [
            'brands' => $data
        ]);
    }
}
