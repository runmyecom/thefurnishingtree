<?php

namespace App\Livewire\Client;

use App\Models\Cart;
use App\Models\Item;
use App\Models\Size;
use Livewire\Component;
use App\Models\ItemModel;
use Livewire\Attributes\Layout;

#[Layout('layouts.guest')]
class ItemsByModel extends Component
{
    public $qty = 1;
    public $model;
    public $search;

    public function mount($id)
    {
        $this->model = ItemModel::find($id);
    }

    public
        $paginate = 10,
        $sortBy = 'items.id',
        $sortDirection = 'desc';

    public function render()
    {
        $data = Item::where('item_name', 'like', '%'.$this->search.'%')
            ->where('model_id', $this->model->id)
            ->first();

        $calcdiscount = $data->selling_price / $data->mrp * 100;

        return view('livewire.client.items-by-model',[
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
