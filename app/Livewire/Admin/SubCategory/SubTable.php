<?php

namespace App\Livewire\Admin\SubCategory;

use Livewire\Component;
use App\Models\SubCategory;
use App\Traits\WithSorting;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use App\Livewire\Forms\SubCategoryForm;

class SubTable extends Component
{
    use WithPagination;
    use WithSorting;

    public SubCategoryForm $form;

    public 
        $paginate = 10,
        $sortBy = 'sub_categories.id',
        $sortDirection = 'desc';

    #[On('dispatch-subcategory-create-save')]
    #[On('dispatch-subcategory-create-edit')]
    #[On('dispatch-subcategory-delete-del')]
    public function render()
    {
        return view('livewire.admin.sub-category.sub-table', [
            'data' => SubCategory::where('name', 'like', '%'.$this->form->name.'%')
                ->with('category')
                ->orderBy($this->sortBy, $this->sortDirection)
                ->paginate($this->paginate)
        ]);
    }
}
