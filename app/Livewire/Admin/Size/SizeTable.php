<?php

namespace App\Livewire\Admin\Size;

use Livewire\Component;
use App\Models\ItemSize;
use App\Traits\WithSorting;
use Livewire\WithPagination;
use App\Livewire\Forms\SizeForm;

class SizeTable extends Component
{
    use WithPagination;
    use WithSorting;

    public SizeForm $form;

    public
        $paginate = 10,
        $sortBy = 'item_sizes.id',
        $sortDirection = 'desc';

    public function render()
    {
        return view('livewire.admin.size.size-table', [
            'data' => ItemSize::where('name', 'like', '%'.$this->form->name.'%')
                ->with('item')
                ->orderBy($this->sortBy, $this->sortDirection)
                ->paginate($this->paginate)
        ]);
    }
}
