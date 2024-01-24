<?php

namespace App\Livewire\Admin\Size;

use App\Models\Size;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Locked;
use App\Livewire\Admin\Size\SizeTable;

class SizeDelete extends Component
{
    #[Locked]
    public $id;

    #[Locked]
    public $name;

    public $modalDelete = false;

    #[On('dispatch-size-table-delete')]
    public function set_size($id, $name)
    {
        $this->id = $id;
        $this->name = $name;
        $this->modalDelete = true;
    }

    public function del()
    {
        $del = Size::destroy($this->id);

        ($del)
        ? $this->dispatch('notify', title: 'success', message: 'Size deleted')
        : $this->dispatch('notify', title: 'error', message: 'Something goes wrong!');
        
        $this->modalDelete = false;

        $this->dispatch('dispatch-size-delete-del')->to(SizeTable::class);
    }
    public function render()
    {
        return view('livewire.admin.size.size-delete');
    }
}
