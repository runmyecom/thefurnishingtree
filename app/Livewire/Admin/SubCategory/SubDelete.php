<?php

namespace App\Livewire\Admin\SubCategory;

use Livewire\Component;
use App\Models\SubCategory;
use Livewire\Attributes\On;
use Livewire\Attributes\Locked;

class SubDelete extends Component
{

    #[Locked]
    public $id;

    #[Locked]
    public $name;

    public $modalDelete = false;

    #[On('dispatch-subcategory-table-delete')]
    public function set_subcategory($id, $name)
    {
        $this->id = $id;
        $this->name = $name;

        $this->modalDelete = true;
    }

    public function del()
    {
        $del = SubCategory::destroy($this->id);

        ($del)
        ? $this->dispatch('notify', title: 'success', message: 'Sub-Category deleted')
        : $this->dispatch('notify', title: 'error', message: 'Something goes wrong!');
        
        $this->modalDelete = false;

        $this->dispatch('dispatch-subcategory-delete-del')->to(SubTable::class);
    }

    public function render()
    {
        return view('livewire.admin.sub-category.sub-delete');
    }
}
