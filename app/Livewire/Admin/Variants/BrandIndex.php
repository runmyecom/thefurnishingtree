<?php

namespace App\Livewire\Admin\Variants;

use App\Models\Item;
use Livewire\Component;
use App\Traits\WithSorting;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;

#[Layout('layouts.admin')]
class BrandIndex extends Component
{
    use WithPagination;
    use WithSorting;

    public
        $paginate = 16,
        $sortBy = 'items.id',
        $sortDirection = 'desc';

    public function render()
    {
        return view('livewire.admin.variants.brand-index', [
            'brands' => Item::select('brand')
                ->groupBy('brand')
                ->paginate($this->paginate)
        ]);
    }
}
