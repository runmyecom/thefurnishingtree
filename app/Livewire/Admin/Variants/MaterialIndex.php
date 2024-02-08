<?php

namespace App\Livewire\Admin\Variants;

use App\Models\Item;
use Livewire\Component;
use App\Traits\WithSorting;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;

#[Layout('layouts.admin')]
class MaterialIndex extends Component
{
    use WithPagination;
    use WithSorting;

    public
        $paginate = 16,
        $sortBy = 'items.id',
        $sortDirection = 'desc';

    public function render()
    {
        return view('livewire.admin.variants.material-index', [
            'materials' => Item::select('material')
                ->groupBy('material')
                ->paginate($this->paginate)
        ]);
    }
}
