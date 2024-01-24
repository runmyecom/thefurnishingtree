<?php

namespace App\Livewire\Admin\Order;

use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.admin')]
class OrderIndex extends Component
{
    public function render()
    {
        return view('livewire.admin.order.order-index');
    }
}
