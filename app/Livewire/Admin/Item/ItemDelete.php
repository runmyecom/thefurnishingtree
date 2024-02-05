<?php

namespace App\Livewire\Admin\Item;

use App\Models\Item;
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

    public $modalItemDelete = false;

    #[On('dispatch-item-table-delete')]
    public function set_item($id, $name)
    {
        $this->id = $id;
        $this->name = $name;

        $this->modalItemDelete = true;
    }

    public function del()
    {
        $del = Item::destroy($this->id);

        ($del)
        ? $this->dispatch('notify', title: 'success', message: 'Item deleted')
        : $this->dispatch('notify', title: 'error', message: 'Something goes wrong!');

        $this->modalItemDelete = false;

        $this->dispatch('dispatch-item-delete-del')->to(ItemTable::class);
    }

    public function render()
    {
        return view('livewire.admin.item.item-delete');
    }
}
