<?php

namespace App\Livewire\Admin\Material;

use Livewire\Component;
use App\Models\SubCategory;
use App\Livewire\Forms\MaterialForm;

class MaterialCreate extends Component
{
    public MaterialForm $form;
    
    public $modalCreate = false;

    public function save()
    {
        $this->validate();

        $response = $this->form->store();

        is_null($response)
            ? $this->dispatch('notify', title: 'success', message: 'Material created successfully')
            : $this->dispatch('notify', title: 'error', message: 'Something goes wrong!');

        $this->dispatch('dispatch-material-create-save')->to(MaterialTable::class);
    }

    public function render()
    {
        return view('livewire.admin.material.material-create', [
            'subcategories' => SubCategory::all()
        ]);
    }
}
