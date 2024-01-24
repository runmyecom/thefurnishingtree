<?php

namespace App\Livewire;

use App\Models\Cart;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;

#[Layout('layouts.guest')]
class ShoppingCart extends Component
{
    public $cartitems, $sub_total = 0, $total = 0, $tax = 0;

    public function render()
    {
        if (Auth::check()) {
            $this->cartitems = Cart::with('item')
                ->where(['user_id'=>auth()->user()->id])
                ->get();
            $this->total = 0; $this->sub_total = 0; $this->tax = 0;
            foreach($this->cartitems as $item){
                $this->sub_total += $item['item_price'] * $item['quantity'];
            }
            $this->total = $this->sub_total - $this->tax;
        };

        return view('livewire.shopping-cart');
    }

    public function removeItem($id){
        $cart = Cart::whereId($id)->first();
        if($cart){
            $cart->delete();
            $this->dispatch('updateCartCount');
        }
        $this->dispatch('notify', title: 'error', message: 'Item removed from cart !!');
    }

    public function incrementQty($id){
        $cart = Cart::whereId($id)->first();
        $cart->quantity += 1;
        $cart->save();
        $this->dispatch('updateCartCount');
        $this->dispatch('notify', title: 'success', message: 'item quantity updated !!');
    }
    public function decrementQty($id){
        $cart = Cart::whereId($id)->first();
        if($cart->quantity > 1){
            $cart->quantity -= 1;
            $cart->save();
            $this->dispatch('updateCartCount');
            $this->dispatch('notify', title: 'success', message: 'item quantity updated !!');
        } else {
            $this->dispatch('notify', title: 'error', message: 'You cannot have less than 1 quantity');
        }
    }
}
