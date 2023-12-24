<?php

namespace App\Livewire\Admin\Category;

use App\Livewire\Forms\CategoryForm;
use Livewire\Component;
use App\Models\Category;
use App\Traits\WithSorting;
use Livewire\Attributes\On;
use Livewire\WithPagination;

class CategoryTable extends Component
{
    use WithPagination;
    use WithSorting;

    public CategoryForm $form;

    public 
        $paginate = 10,
        $sortBy = 'categories.id',
        $sortDirection = 'desc';

    #[On('dispatch-category-create-save')]
    #[On('dispatch-category-create-edit')]
    #[On('dispatch-category-delete-del')]
    public function render()
    {
        return view('livewire.admin.category.category-table', [
            'data' => Category::where('name', 'like', '%'.$this->form->name.'%')
                ->orderBy($this->sortBy, $this->sortDirection)
                ->paginate($this->paginate)
        ]);
    }
}
