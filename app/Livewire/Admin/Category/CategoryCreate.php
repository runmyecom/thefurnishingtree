<?php

namespace App\Livewire\Admin\Category;

use Livewire\Component;
use App\Livewire\Forms\CategoryForm;
use App\Livewire\Admin\Category\CategoryTable;

class CategoryCreate extends Component
{
    public CategoryForm $form;
   
    public $modalCategoryCreate = false;

    public function save()
    {
        $this->validate();

        $response = $this->form->store();

        is_null($response)
            ? $this->dispatch('notify', title: 'success', message: 'Category created successfully')
            : $this->dispatch('notify', title: 'error', message: 'Something goes wrong!');

        $this->dispatch('dispatch-category-create-save')->to(CategoryTable::class);
    }
    
    public function render()
    {
        return view('livewire.admin.category.category-create');
    }
}
