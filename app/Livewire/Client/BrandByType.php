<?php

namespace App\Livewire\Client;

use App\Models\Item;
use App\Models\Node;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
class BrandByType extends Component
{
    public $node;

    public function mount($type = null)
    {
        $this->node = Node::where('type_name', $type)->firstOrFail();
    }

    public
        $paginate = 40,
        $sortBy = 'items.id',
        $sortDirection = 'desc';

    public function render()
    {
        // $this->node = Node::where('type_name', $this->slug)->first();

        // $data = Brand::where('node_id', $this->node->id)
        //     ->orderBy($this->sortBy, $this->sortDirection)
        //     ->paginate($this->paginate);

        $data = Item::where('node_id', $this->node->id)
            ->select('brand')
            ->groupBy('brand')
            ->get();

        return view('livewire.client.brand-by-type', [
            'brands' => $data,
            'type' => $this->node->type_name
        ]);
    }
}
