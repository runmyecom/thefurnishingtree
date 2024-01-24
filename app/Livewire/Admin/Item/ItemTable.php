<?php

namespace App\Livewire\Admin\Item;

use App\Models\Item;
use Livewire\Component;
use App\Traits\WithSorting;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use App\Livewire\Forms\ItemForm;

class ItemTable extends Component
{
    use WithPagination;
    use WithSorting;

    public ItemForm $form;

    public 
        $paginate = 20,
        $sortBy = 'items.id',
        $sortDirection = 'desc';

    #[On('dispatch-item-create-save')]
    #[On('dispatch-item-create-edit')]
    #[On('dispatch-item-delete-del')]
    public function render()
    {
        return view('livewire.admin.item.item-table', [
            'data' => Item::where('item_name', 'like', '%'.$this->form->item_name.'%')
                ->with('model')
                ->orderBy($this->sortBy, $this->sortDirection)
                ->paginate($this->paginate)
        ]);
    }
}
