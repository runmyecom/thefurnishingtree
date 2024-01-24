<?php

namespace App\Livewire\Admin\Color;

use App\Models\Color;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Locked;
use App\Livewire\Admin\Color\ColorTable;

class ColorDelete extends Component
{
    #[Locked]
    public $id;

    #[Locked]
    public $name;

    public $modalDelete = false;

    #[On('dispatch-color-table-delete')]
    public function set_color($id, $name)
    {
        $this->id = $id;
        $this->name = $name;

        $this->modalDelete = true;
    }

    public function del()
    {
        $del = Color::destroy($this->id);

        ($del)
        ? $this->dispatch('notify', title: 'success', message: 'Color deleted')
        : $this->dispatch('notify', title: 'error', message: 'Something goes wrong!');
        
        $this->modalDelete = false;

        $this->dispatch('dispatch-color-delete-del')->to(ColorTable::class);
    }
    
    public function render()
    {
        return view('livewire.admin.color.color-delete');
    }
}
