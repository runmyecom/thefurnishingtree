<?php

namespace App\Livewire\Client;

use App\Models\Cart;
use App\Models\Item;
use App\Models\Node;
use Livewire\Component;
use App\Models\ItemModel;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
class ItemByColor extends Component
{
    public $qty = 1;
    public $node;
    public $brand;
    public $material;
    public $color;
    public $search;
    public $size;
    public $models;
    public $modelName;

    public function mount($type = null, $brand = null, $material = null, $color = null, $size = null, $models = [])
    {
        $this->node = Node::where('type_name', $type)->firstOrFail();
        $this->brand = $brand;
        $this->$material = $material;
        $this->$color = $color;
    }

    public function selectedSize($size){
        $this->size = $size;

        $data = ItemModel::whereId($size)->get();
        $this->models = $data;
    }

    public function selectedModel($model){
        $data = ItemModel::whereId($model)->first();
        $this->modelName = $data->name;
    }

    public
        $paginate = 10,
        $sortBy = 'items.id',
        $sortDirection = 'desc';

    public function render()
    {
        $item = Item::where('color', str_replace('-', ' ', ucwords($this->color)))
            ->where('material', str_replace('-', ' ', ucwords($this->material)))
            ->where('brand', str_replace('-', ' ', ucwords($this->brand)))
            ->where('node_id', $this->node->id)
            ->with('sizes')
            ->first();

        $calcdiscount = $item->selling_price / $item->mrp * 100;

        return view('livewire.client.item-by-color', [
            'type' => $this->node->type_name,
            'brand' => $this->brand,
            'material' => $this->material,
            'color' => $this->color,
            'item' => $item,
            'discount' => round($calcdiscount)
        ]);
    }

    public function addToCart($id){
        if(auth()->user()){
            $item = Item::where('id', $id)->first();
            $data = [
                'user_id' => auth()->user()->id,
                'item_id' => $id,
                'item_name' => $item->item_name,
                'item_price' => $item->selling_price,
            ];
            Cart::updateOrCreate($data);

            $this->dispatch('updateCartCount');

            is_null($data)
                ? $this->dispatch('notify', title: 'error', message: 'Something goes wrong!')
                : $this->dispatch('notify', title: 'success', message: 'Item added to the cart');
        } else {
            // redirect to login
            return redirect(route('login'));
        }
    }


}
