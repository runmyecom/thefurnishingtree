<?php

namespace App\Livewire;

use App\Models\Cart;
use App\Models\Item;
use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class GuestNavigation extends Component
{
    public $openSearch = false;
    public $search = "";
    public $result;

    public function render()
    {
        $results = [];

        if(strlen($this->search) >= 1){
            $results = Item::where('item_name', 'like', '%'.$this->search.'%')->limit(7)->get();
        }

        $categories = Category::skip(4)->take(10)->get();
        return view('livewire.guest-navigation', [
            'categories' => $categories,
            'items' => $results
        ]);
    }

    public function closeSearch(){
        $this->openSearch = false;
        $this->search = '';
    }

    public function toNext(){
        if(Auth::check()){
            return redirect(route('shopping-cart'));
        } else {
            $this->dispatch('notify', title: 'error', message: 'Please login to your account!!');
        }
    }

}
