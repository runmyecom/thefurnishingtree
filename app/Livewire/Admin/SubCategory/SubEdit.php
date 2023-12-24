<?php

namespace App\Livewire\Admin\SubCategory;

use Livewire\Component;
use App\Models\Category;
use App\Models\SubCategory;
use Livewire\Attributes\On;
use App\Livewire\Forms\SubCategoryForm;

class SubEdit extends Component
{
    public SubCategoryForm $form;

    public $modalEdit = false;

    #[On('dispatch-subcategory-table-edit')]
    public function set_subcategory(SubCategory $id)
    {
        $this->form->setSubcategory($id);
        $this->modalEdit = true;
    }

    public function edit()
    {
        $this->validate();
        $update = $this->form->update();

        $this->dispatch('dispatch-subcategory-create-edit')->to(SubTable::class);

        is_null($update)
            ? $this->dispatch('notify', title: 'success', message: 'Updated successfully')
            : $this->dispatch('notify', title: 'error', message: 'Something goes wrong!');
    }

    public function render()
    {
        return view('livewire.admin.sub-category.sub-edit',[
            'categories' => Category::all()
        ]);
    }
}
