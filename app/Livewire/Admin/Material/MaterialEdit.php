<?php

namespace App\Livewire\Admin\Material;

use Livewire\Component;
use App\Models\Material;
use App\Models\SubCategory;
use Livewire\Attributes\On;
use App\Livewire\Forms\MaterialForm;

class MaterialEdit extends Component
{
    public MaterialForm $form;

    public $modalEdit = false;

    #[On('dispatch-material-table-edit')]
    public function set_material(Material $id)
    {
        $this->form->setMaterial($id);
        $this->modalEdit = true;
    }

    public function edit()
    {
        $this->validate();
        $update = $this->form->update();

        $this->dispatch('dispatch-material-create-edit')->to(MaterialTable::class);

        is_null($update)
            ? $this->dispatch('notify', title: 'success', message: 'Updated successfully')
            : $this->dispatch('notify', title: 'error', message: 'Something goes wrong!');
    }

    public function render()
    {
        return view('livewire.admin.material.material-edit', [
            'subcategories' => SubCategory::all()
        ]);
    }
}
