<?php

namespace App\Livewire\Admin\Type;

use App\Models\Type;
use Livewire\Component;
use App\Models\SubCategory;
use Livewire\Attributes\On;
use App\Livewire\Forms\TypeForm;

class TypeEdit extends Component
{
    public TypeForm $form;

    public $modalEdit = false;

    #[On('dispatch-type-table-edit')]
    public function set_type(Type $id)
    {
        $this->form->setType($id);
        $this->modalEdit = true;
    }

    public function edit()
    {
        $this->validate();
        $update = $this->form->update();

        $this->dispatch('dispatch-type-create-edit')->to(TypeTable::class);

        is_null($update)
            ? $this->dispatch('notify', title: 'success', message: 'Updated successfully')
            : $this->dispatch('notify', title: 'error', message: 'Something goes wrong!');
    }

    public function render()
    {
        return view('livewire.admin.type.type-edit',[
            'subcategories' => SubCategory::all()
        ]);
    }
}
