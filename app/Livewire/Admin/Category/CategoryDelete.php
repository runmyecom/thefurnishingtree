<?php

namespace App\Livewire\Admin\Category;

use Livewire\Component;
use App\Models\Category;
use Livewire\Attributes\On;
use Livewire\Attributes\Locked;

class CategoryDelete extends Component
{
    #[Locked]
    public $id;

    #[Locked]
    public $name;

    public $modalCategoryDelete = false;

    #[On('dispatch-category-table-delete')]
    public function set_category($id, $name)
    {
        $this->id = $id;
        $this->name = $name;

        $this->modalCategoryDelete = true;
    }

    public function del()
    {
        $del = Category::destroy($this->id);

        
        ($del)
        ? $this->dispatch('notify', title: 'success', message: 'Category deleted')
        : $this->dispatch('notify', title: 'error', message: 'Something goes wrong!');
        
        $this->modalCategoryDelete = false;

        $this->dispatch('dispatch-category-delete-del')->to(CategoryTable::class);
    }

    public function render()
    {
        return view('livewire.admin.category.category-delete');
    }
}
