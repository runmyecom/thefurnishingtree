<?php

namespace App\Livewire\Admin\Category;

use Livewire\Component;
use App\Models\Category;
use Livewire\Attributes\On;
use App\Livewire\Forms\CategoryForm;

class CategoryEdit extends Component
{
    public CategoryForm $form;

    public $modalCategoryEdit = false;

    #[On('dispatch-category-table-edit')]
    public function set_category(Category $id)
    {
        $this->form->setCategory($id);
        $this->modalCategoryEdit = true;
    }

    public function edit()
    {
        $this->validate();
        $update = $this->form->update();

        $this->dispatch('dispatch-category-create-edit')->to(CategoryTable::class);

        is_null($update)
            ? $this->dispatch('notify', title: 'success', message: 'Category updated successfully')
            : $this->dispatch('notify', title: 'error', message: 'Something goes wrong!');
    }

    public function render()
    {
        return view('livewire.admin.category.category-edit');
    }
}
