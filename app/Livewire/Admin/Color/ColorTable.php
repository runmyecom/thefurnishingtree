<?php

namespace App\Livewire\Admin\Color;

use App\Models\Color;
use Livewire\Component;
use App\Traits\WithSorting;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use App\Livewire\Forms\ColorForm;

class ColorTable extends Component
{
    use WithPagination;
    use WithSorting;

    public ColorForm $form;

    public 
        $paginate = 10,
        $sortBy = 'colors.id',
        $sortDirection = 'desc';

    #[On('dispatch-color-create-save')]
    #[On('dispatch-color-create-edit')]
    #[On('dispatch-color-delete-del')]
    public function render()
    {
        return view('livewire.admin.color.color-table', [
            'data' => Color::where('name', 'like', '%'.$this->form->name.'%')
                ->with('material')
                ->orderBy($this->sortBy, $this->sortDirection)
                ->paginate($this->paginate)
        ]);
    }
}
