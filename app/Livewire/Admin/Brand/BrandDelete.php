<?php

namespace App\Livewire\Admin\Brand;

use App\Models\Brand;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Locked;
use App\Livewire\Admin\Brand\BrandTable;

class BrandDelete extends Component
{
    #[Locked]
    public $id;

    #[Locked]
    public $name;

    public $modalDelete = false;

    #[On('dispatch-brand-table-delete')]
    public function set_brand($id, $name)
    {
        $this->id = $id;
        $this->name = $name;
        $this->modalDelete = true;
    }

    public function del()
    {
        $del = Brand::destroy($this->id);

        ($del)
        ? $this->dispatch('notify', title: 'success', message: 'Brand deleted')
        : $this->dispatch('notify', title: 'error', message: 'Something goes wrong!');
        
        $this->modalDelete = false;
        $this->dispatch('dispatch-brand-delete-del')->to(BrandTable::class);
    }

    
    public function render()
    {
        return view('livewire.admin.brand.brand-delete');
    }
}
