<?php

namespace App\Livewire\Client;

use App\Models\Cart;
use App\Models\Item;
use App\Models\Node;
use Livewire\Component;
use Livewire\Attributes\Url;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
class ItemByType extends Component
{
    public $qty = 1;
    public $node;

    #[Url(as: 'brand')]
    public $brandInputs = [];

    #[Url(as: 'material')]
    public $materialInputs = [];

    #[Url(as: 'color')]
    public $colorInputs = [];

    #[Url(as: 'size')]
    public $sizeInputs = [];

    #[Url(as: 'model')]
    public $modelInputs = [];

    public function mount($type = null)
    {
        $this->node = Node::where('type_name', $type)->firstOrFail();
    }

    public
        $paginate = 10,
        $sortBy = 'items.id',
        $sortDirection = 'desc';

    public function render()
    {
        $brands = Item::where('node_id', $this->node->id)->select('brand')->groupBy('brand')->get();

        $sizes = Item::where('node_id', $this->node->id)
            ->whereIn('brand', $this->brandInputs)
            ->select('size')->groupBy('size')
            ->get();
        $models = Item::where('node_id', $this->node->id)
            ->whereIn('brand', $this->brandInputs)
            ->whereIn('size', $this->sizeInputs)
            ->select('model')->groupBy('model')
            ->get();

        $materials = Item::where('node_id', $this->node->id)
            ->whereIn('brand', $this->brandInputs)
            ->whereIn('size', $this->sizeInputs)
            ->whereIn('model', $this->modelInputs)
            ->select('material')->groupBy('material')
            ->get();
        $colors = Item::where('node_id', $this->node->id)
            ->whereIn('brand', $this->brandInputs)
            ->whereIn('size', $this->sizeInputs)
            ->whereIn('model', $this->modelInputs)
            ->whereIn('material', $this->materialInputs)
            ->select('color')->groupBy('color')
            ->get();

        $items = Item::where('node_id',$this->node->id)
            ->when($this->brandInputs, function($q) {
                $q->whereIn('brand', $this->brandInputs);
            })
            ->when($this->sizeInputs, function($q) {
                $q->whereIn('brand', $this->brandInputs)
                    ->whereIn('size', $this->sizeInputs);
            })
            ->when($this->modelInputs, function($q) {
                $q->whereIn('brand', $this->brandInputs)
                    ->whereIn('size', $this->sizeInputs)
                    ->whereIn('model', $this->modelInputs);
            })
            ->when($this->materialInputs, function($q) {
                $q->whereIn('brand', $this->brandInputs)
                    ->whereIn('size', $this->sizeInputs)
                    ->whereIn('model', $this->modelInputs)
                    ->whereIn('material', $this->materialInputs);
            })
            ->when($this->colorInputs, function($q) {
                $q->whereIn('brand', $this->brandInputs)
                    ->whereIn('size', $this->sizeInputs)
                    ->whereIn('model', $this->modelInputs)
                    ->whereIn('material', $this->materialInputs)
                    ->whereIn('color', $this->colorInputs);
            })
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate($this->paginate);

        return view('livewire.client.item-by-type',[
            'type' => $this->node->type_name,
            'brands' => $brands,
            'sizes' => $sizes,
            'models' => $models,
            'materials' => $materials,
            'colors' => $colors,
            'items' => $items,
        ]);
    }

}
