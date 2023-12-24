<?php

namespace App\Livewire\Admin\Material;

use App\Models\Material;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Locked;

class MaterialDelete extends Component
{
    #[Locked]
    public $id;

    #[Locked]
    public $name;

    public $modalDelete = false;

    #[On('dispatch-material-table-delete')]
    public function set_material($id, $name)
    {
        $this->id = $id;
        $this->name = $name;

        $this->modalDelete = true;
    }

    public function del()
    {
        $del = Material::destroy($this->id);

        ($del)
        ? $this->dispatch('notify', title: 'success', message: 'Material deleted')
        : $this->dispatch('notify', title: 'error', message: 'Something goes wrong!');
        
        $this->modalDelete = false;

        $this->dispatch('dispatch-material-delete-del')->to(MaterialTable::class);
    }
    
    public function render()
    {
        return view('livewire.admin.material.material-delete');
    }
}
