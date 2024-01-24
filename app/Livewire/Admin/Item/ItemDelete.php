<?php

namespace App\Livewire\Admin\Item;

use Livewire\Component;
use App\Models\Category;
use Livewire\Attributes\On;
use Livewire\Attributes\Locked;
use App\Livewire\Admin\Item\ItemTable;

class ItemDelete extends Component
{
    #[Locked]
    public $id;

    #[Locked]
    public $name;

    public $modalDelete = false;

    #[On('dispatch-item-table-delete')]
    public function set_item($id, $name)
    {
        $this->id = $id;
        $this->name = $name;

        $this->modalDelete = true;
    }

    public function del()
    {
        $del = Category::destroy($this->id);

        ($del)
        ? $this->dispatch('notify', title: 'success', message: 'Item deleted')
        : $this->dispatch('notify', title: 'error', message: 'Something goes wrong!');
        
        $this->modalDelete = false;

        $this->dispatch('dispatch-subcategory-delete-del')->to(ItemTable::class);
    }

    public function render()
    {
        return view('livewire.admin.item.item-delete');
    }
}
