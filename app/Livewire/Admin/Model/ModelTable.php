<?php

namespace App\Livewire\Admin\Model;

use Livewire\Component;
use App\Models\ItemModel;
use App\Traits\WithSorting;
use Livewire\WithPagination;
use App\Livewire\Forms\ModelForm;

class ModelTable extends Component
{
    use WithPagination;
    use WithSorting;

    public ModelForm $form;

    public
        $paginate = 10,
        $sortBy = 'item_models.id',
        $sortDirection = 'desc';

    public function render()
    {
        return view('livewire.admin.model.model-table',[
            'data' => ItemModel::where('name', 'like', '%'.$this->form->name.'%')
                ->with('size')
                ->orderBy($this->sortBy, $this->sortDirection)
                ->paginate($this->paginate)
        ]);
    }
}
