<?php

namespace App\Livewire;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout;

#[Layout('layouts.guest')]
class Checkout extends Component
{
    public $carts, $totalItemAmount = 0;

    public $fullname, $email, $phone, $pincode, $address, $payment_mode = NULL, $payment_id = NULL;

    public function rules(){
        return [
            'fullname' => 'required|string|max:121',
            'email' => 'required|email|max:121',
            'phone' => 'required|string|min:10|max:11',
            'pincode' => 'required|string|max:6|min:6',
            'address' => 'required|string|max:500',
        ];
    }

    public function placeOrder(){
        $this->validate();
        $order = Order::create([
            'user_id' => auth()->user()->id,
            'tracking_no' => 'tft-'.Str::random(10),
            'fullname' => $this->fullname,
            'email' => $this->email,
            'phone' => $this->phone,
            'pincode' => $this->pincode,
            'address' => $this->address,
            'status_message' => 'in progress',
            'payment_mode' => $this->payment_mode,
            'payment_id' => $this->payment_id
        ]);

        foreach($this->carts as $cartItem){
            $orderItems = OrderItem::create([
                'order_id' => $order->id,
                'item_id' => $cartItem->item_id,
                'quantity' => $cartItem->quantity,
                'price' => $cartItem->item_price,
                'details' => 'sample details'
            ]);
        }

        return $order;
    }

    public function codOrder(){
        $this->payment_mode = 'Cash on Delivery';
        $codOrder = $this->placeOrder();
        if($codOrder){
            Cart::where('user_id', auth()->user()->id)->delete();
            $this->dispatch('updateCartCount');
            $this->dispatch('notify', title: 'sucess', message: 'Order Placed Successfully');

            return redirect()->to('thank-you');
        } else {
            $this->dispatch('notify', title: 'error', message: 'Something went wrong');
        }
    }

    public function totalItemAmount(){
        $this->totalItemAmount = 0;
        $this->carts = Cart::where(['user_id'=>auth()->user()->id])->get();
        foreach($this->carts as $cartItem){
            $this->totalItemAmount += $cartItem->item->selling_price * $cartItem->quantity;
        }
        return $this->totalItemAmount;
    }

    public function render()
    {
        $this->fullname = auth()->user()->name;
        $this->email = auth()->user()->email;

        $this->totalItemAmount = $this->totalItemAmount();
        return view('livewire.checkout', [
            'totalItemAmount' => $this->totalItemAmount
        ]);
    }
}
