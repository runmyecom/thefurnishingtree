<?php

namespace App\Livewire\Admin\Type;

use App\Models\Type;
use Livewire\Component;
use App\Traits\WithSorting;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use App\Livewire\Forms\TypeForm;

class TypeTable extends Component
{
    use WithPagination;
    use WithSorting;

    public TypeForm $form;

    public 
        $paginate = 10,
        $sortBy = 'types.id',
        $sortDirection = 'desc';

    #[On('dispatch-type-create-save')]
    #[On('dispatch-type-create-edit')]
    #[On('dispatch-type-delete-del')]
    public function render()
    {
        return view('livewire.admin.type.type-table', [
            'data' => Type::where('name', 'like', '%'.$this->form->name.'%')
                ->with('subcategory')
                ->orderBy($this->sortBy, $this->sortDirection)
                ->paginate($this->paginate)
        ]);
    }
}
