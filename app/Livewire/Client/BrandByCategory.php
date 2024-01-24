<?php

namespace App\Livewire\Client;

use App\Models\Node;
use App\Models\Brand;
use Livewire\Component;
use App\Models\SubCategory;
use Livewire\Attributes\Layout;

#[Layout('layouts.guest')]
class BrandByCategory extends Component
{
    public $subcategory;
    public $node;

    public function mount($id)
    {
        $this->subcategory = SubCategory::find($id);
    }

    public
        $paginate = 10,
        $sortBy = 'brands.id',
        $sortDirection = 'desc';
    public function render()
    {
        $this->node = Node::where('subcategory_id', $this->subcategory->id)->first();

        $data = Brand::where('node_id', $this->node->id)
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate($this->paginate);

        return view('livewire.client.brand-by-category', [
            'brands' => $data
        ]);
    }
}
