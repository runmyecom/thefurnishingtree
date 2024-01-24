<?php

namespace App\Livewire;

use App\Models\Cart;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class CartCounter extends Component
{
    public $total = 0;

    protected $listeners = ['updateCartCount' => 'getCartItemCount'];

    public function render()
    {
        $this->getCartItemCount();
        return view('livewire.cart-counter');
    }

    public function getCartItemCount(){
        if(Auth::check()){
            $this->total = Cart::whereUserId(auth()->user()->id)->count();
        } else {
            $this->total = 0;
        }
    }
}
