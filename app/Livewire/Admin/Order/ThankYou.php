<?php

namespace App\Livewire\Admin\Order;

use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.guest')]
class ThankYou extends Component
{
    public function render()
    {
        return view('livewire.admin.order.thank-you');
    }
}
