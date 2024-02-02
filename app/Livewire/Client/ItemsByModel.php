<?php

namespace App\Livewire\Client;

use App\Models\Cart;
use App\Models\Item;
use App\Models\Node;
use App\Models\Size;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
class ItemsByModel extends Component
{
    public $qty = 1;
    public $node;
    public $brand;
    public $material;
    public $color;
    public $size;
    public $model;
    public $search;

    public function mount($type_name, $brand, $material, $color, $size, $model)
    {
        $this->node = Node::where('type_name', $type_name)->firstOrFail();
        $this->brand = $brand;
        $this->$material = $material;
        $this->$color = $color;
        $this->$size = $size;
        $this->$model = $model;
    }

    public
        $paginate = 10,
        $sortBy = 'items.id',
        $sortDirection = 'desc';

    public function render()
    {
        $data = Item::where('model', str_replace('-', ' ', ucwords($this->model)))
            ->first();

        $calcdiscount = $data->selling_price / $data->mrp * 100;

        return view('livewire.client.items-by-model',[
            'type_name' => $this->node->type_name,
            'brand' => $this->brand,
            'material' => $this->material,
            'color' => $this->color,
            'size' => $this->size,
            'model' => $this->model,
            'item' => $data,
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
