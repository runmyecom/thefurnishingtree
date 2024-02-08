<?php

namespace App\Livewire\Admin\Variants;

use App\Models\Item;
use Livewire\Component;
use App\Traits\WithSorting;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;

#[Layout('layouts.admin')]
class SizeIndex extends Component
{
    use WithPagination;
    use WithSorting;

    public
        $paginate = 12,
        $sortBy = 'items.id',
        $sortDirection = 'desc';

    public function render()
    {
        return view('livewire.admin.variants.size-index',[
            'sizes' => Item::select('size')
                ->groupBy('size')
                ->paginate($this->paginate)
        ]);
    }
}
