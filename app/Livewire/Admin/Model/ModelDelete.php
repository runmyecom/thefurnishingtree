<?php

namespace App\Livewire\Admin\Model;

use Livewire\Component;
use App\Models\ItemModel;
use Livewire\Attributes\On;
use Livewire\Attributes\Locked;
use App\Livewire\Admin\Model\ModelTable;

class ModelDelete extends Component
{
    #[Locked]
    public $id;

    #[Locked]
    public $name;

    public $modalDelete = false;

    #[On('dispatch-model-table-delete')]
    public function set_model($id, $name)
    {
        $this->id = $id;
        $this->name = $name;
        $this->modalDelete = true;
    }

    public function del()
    {
        $del = ItemModel::destroy($this->id);

        ($del)
        ? $this->dispatch('notify', title: 'success', message: 'Model deleted')
        : $this->dispatch('notify', title: 'error', message: 'Something goes wrong!');
        
        $this->modalDelete = false;
        $this->dispatch('dispatch-model-delete-del')->to(ModelTable::class);
    }
    
    public function render()
    {
        return view('livewire.admin.model.model-delete');
    }
}
