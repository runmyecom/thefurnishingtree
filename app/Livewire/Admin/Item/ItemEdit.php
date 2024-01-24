<?php

namespace App\Livewire\Admin\Item;

use App\Models\Item;
use Livewire\Component;
use Livewire\Attributes\On;
use App\Livewire\Forms\ItemForm;
use App\Livewire\Admin\Item\ItemTable;

class ItemEdit extends Component
{
    public ItemForm $form;

    public $modalEdit = false;

    #[On('dispatch-item-table-edit')]
    public function set_item(Item $id)
    {
        $this->form->setItem($id);
        $this->modalEdit = true;
    }

    public function edit()
    {
        $this->validate();
        $update = $this->form->update();

        $this->dispatch('dispatch-item-create-edit')->to(ItemTable::class);

        is_null($update)
            ? $this->dispatch('notify', title: 'success', message: 'Updated successfully')
            : $this->dispatch('notify', title: 'error', message: 'Something goes wrong!');
    }

    public function render()
    {
        return view('livewire.admin.item.item-edit');
    }
}
