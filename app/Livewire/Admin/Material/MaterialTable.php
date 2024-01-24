<?php

namespace App\Livewire\Admin\Material;

use Livewire\Component;
use App\Models\Material;
use App\Traits\WithSorting;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use App\Livewire\Forms\MaterialForm;

class MaterialTable extends Component
{
    use WithPagination;
    use WithSorting;

    public MaterialForm $form;

    public 
        $paginate = 10,
        $sortBy = 'materials.id',
        $sortDirection = 'desc';

    #[On('dispatch-material-create-save')]
    #[On('dispatch-material-create-edit')]
    #[On('dispatch-material-delete-del')]
    public function render()
    {
        return view('livewire.admin.material.material-table', [
            'data' => Material::where('name', 'like', '%'.$this->form->name.'%')
                ->with('brand')
                ->orderBy($this->sortBy, $this->sortDirection)
                ->paginate($this->paginate)
        ]);
    }
}
