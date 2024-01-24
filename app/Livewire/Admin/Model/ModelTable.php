<?php

namespace App\Livewire\Admin\Model;

use Livewire\Component;
use App\Traits\WithSorting;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use App\Livewire\Forms\ModelForm;
use App\Models\ItemModel;

class ModelTable extends Component
{
    use WithPagination;
    use WithSorting;

    public ModelForm $form;

    public 
        $paginate = 10,
        $sortBy = 'item_models.id',
        $sortDirection = 'desc';

    #[On('dispatch-model-create-save')]
    #[On('dispatch-model-create-edit')]
    #[On('dispatch-model-delete-del')]
    public function render()
    {
        return view('livewire.admin.model.model-table', [
            'data' => ItemModel::where('name', 'like', '%'.$this->form->name.'%')
                ->with('size')
                ->orderBy($this->sortBy, $this->sortDirection)
                ->paginate($this->paginate)
        ]);
    }
}
