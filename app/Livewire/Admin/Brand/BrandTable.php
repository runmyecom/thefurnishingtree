<?php

namespace App\Livewire\Admin\Brand;

use App\Models\Brand;
use Livewire\Component;
use App\Traits\WithSorting;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use App\Livewire\Forms\BrandForm;

class BrandTable extends Component
{
    use WithPagination;
    use WithSorting;

    public BrandForm $form;

    public 
        $paginate = 10,
        $sortBy = 'brands.id',
        $sortDirection = 'desc';

    #[On('dispatch-brand-create-save')]
    #[On('dispatch-brand-create-edit')]
    #[On('dispatch-brand-delete-del')]
    public function render()
    {
        return view('livewire.admin.brand.brand-table', [
            'data' => Brand::where('name', 'like', '%'.$this->form->name.'%')
                ->with('node')
                ->orderBy($this->sortBy, $this->sortDirection)
                ->paginate($this->paginate)
        ]);
    }
}
