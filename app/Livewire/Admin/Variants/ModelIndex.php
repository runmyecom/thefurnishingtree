<?php

namespace App\Livewire\Admin\Variants;

use App\Models\Item;
use Livewire\Component;
use App\Traits\WithSorting;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;

#[Layout('layouts.admin')]
class ModelIndex extends Component
{
    use WithPagination;
    use WithSorting;

    public
        $paginate = 15,
        $sortBy = 'items.id',
        $sortDirection = 'desc';

    public function render()
    {
        return view('livewire.admin.variants.model-index', [
            'models' => Item::select('model')
                ->groupBy('model')
                ->paginate($this->paginate)
        ]);
    }
}
