<?php

namespace App\Livewire\Admin\Type;

use App\Models\Type;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Locked;
use App\Livewire\Admin\Type\TypeTable;

class TypeDelete extends Component
{

    #[Locked]
    public $id;

    #[Locked]
    public $name;

    public $modalDelete = false;

    #[On('dispatch-type-table-delete')]
    public function set_subcategory($id, $name)
    {
        $this->id = $id;
        $this->name = $name;

        $this->modalDelete = true;
    }

    public function del()
    {
        $del = Type::destroy($this->id);

        ($del)
        ? $this->dispatch('notify', title: 'success', message: 'Type deleted')
        : $this->dispatch('notify', title: 'error', message: 'Something goes wrong!');
        
        $this->modalDelete = false;

        $this->dispatch('dispatch-type-delete-del')->to(TypeTable::class);
    }

    
    public function render()
    {
        return view('livewire.admin.type.type-delete');
    }
}
