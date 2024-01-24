<?php

namespace App\Livewire\Admin\Size;

use App\Models\Size;
use Livewire\Component;
use App\Traits\WithSorting;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use App\Livewire\Forms\SizeForm;

class SizeTable extends Component
{
    use WithPagination;
    use WithSorting;

    public SizeForm $form;

    public 
        $paginate = 10,
        $sortBy = 'sizes.id',
        $sortDirection = 'desc';

    #[On('dispatch-size-create-save')]
    #[On('dispatch-size-create-edit')]
    #[On('dispatch-size-delete-del')]
    public function render()
    {
        return view('livewire.admin.size.size-table', [
            'data' => Size::where('name', 'like', '%'.$this->form->name.'%')
                ->with('color')
                ->orderBy($this->sortBy, $this->sortDirection)
                ->paginate($this->paginate)
        ]);
    }
}
