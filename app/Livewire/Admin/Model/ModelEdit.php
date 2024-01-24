<?php

namespace App\Livewire\Admin\Model;

use App\Models\Size;
use Livewire\Component;
use App\Models\ItemModel;
use Livewire\Attributes\On;
use App\Livewire\Forms\ModelForm;
use App\Livewire\Admin\Model\ModelTable;

class ModelEdit extends Component
{
    public ModelForm $form;

    public $modalEdit = false;
    public $resultDiv = false;
    public $search = "";
    public $results;

    public function searchParent(){
        if(!empty($this->search)){
            $this->results = Size::orderby('name','asc')
                      ->select('*')
                      ->where('name','like','%'.$this->search.'%')
                      ->limit(5)
                      ->get();

            $this->resultDiv = true;
        }else{
            $this->resultDiv = false;
        }
    }
    public function fetchDetail($id = 0){
        $result = Size::select('*')
                    ->where('id',$id)
                    ->first();

        $this->search = $result->name;
        $this->form->size_id = $result->id;
        $this->resultDiv = false;
    }

    #[On('dispatch-model-table-edit')]
    public function set_model(ItemModel $id)
    {
        $this->form->setModel($id);
        $this->modalEdit = true;
    }

    public function edit()
    {
        $this->validate();
        $update = $this->form->update();

        $this->dispatch('dispatch-model-create-edit')->to(ModelTable::class);

        is_null($update)
            ? $this->dispatch('notify', title: 'success', message: 'Updated successfully')
            : $this->dispatch('notify', title: 'error', message: 'Something goes wrong!');
    }

    public function render()
    {
        return view('livewire.admin.model.model-edit', [
            'sizes' => Size::all()
        ]);
    }
}
