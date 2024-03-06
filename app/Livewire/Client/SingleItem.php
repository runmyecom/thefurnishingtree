<?php

namespace App\Livewire\Client;

use App\Models\Cart;
use App\Models\Item;
use App\Models\Node;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
class SingleItem extends Component
{
    public $qty = 1;
    public $type;
    public $node;
    public $slug;
    public $search;

    public function mount($slug = null, $type = null)
    {
        $this->node = Node::where('type_name', $type)->firstOrFail();

        $this->$slug = $slug;
    }

    public function render()
    {
        $data = Item::where('slug', $this->slug)->first();

        $calcdiscount = $data->selling_price / $data->mrp * 100;

        return view('livewire.client.single-item',[
            'type' => $this->node->type_name,
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
