<?php

namespace App\Livewire\Admin\Order;

use App\Models\Order;
use Livewire\Component;
use App\Traits\WithSorting;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use App\Livewire\Forms\OrderForm;

class OrderTable extends Component
{
    use WithPagination;
    use WithSorting;

    public OrderForm $form;

    public
        $paginate = 10,
        $sortBy = 'orders.id',
        $sortDirection = 'desc';

    public function render()
    {
        return view('livewire.admin.order.order-table', [
            'data' => Order::where('user_id', auth()->user()->id)
                ->orderBy($this->sortBy, $this->sortDirection)
                ->paginate($this->paginate)
        ]);
    }
}
