<?php

namespace App\Livewire\Admin\SubCategory;

use Livewire\Component;
use App\Livewire\Forms\SubCategoryForm;
use App\Livewire\Admin\SubCategory\SubTable;
use App\Models\Category;

class SubCreate extends Component
{
    public SubCategoryForm $form;
    
    public $modalCreate = false;

    public function save()
    {
        $this->validate();

        $response = $this->form->store();

        is_null($response)
            ? $this->dispatch('notify', title: 'success', message: 'Sub-Category created successfully')
            : $this->dispatch('notify', title: 'error', message: 'Something goes wrong!');

        $this->dispatch('dispatch-subcategory-create-save')->to(SubTable::class);
    }

    public function render()
    {
        return view('livewire.admin.sub-category.sub-create', [
            'categories' => Category::all()
        ]);
    }
}
