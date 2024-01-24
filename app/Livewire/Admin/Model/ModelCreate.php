<?php

namespace App\Livewire\Admin\Model;

use App\Models\Size;
use Livewire\Component;
use App\Livewire\Forms\ModelForm;
use App\Livewire\Admin\Model\ModelTable;

class ModelCreate extends Component
{
    public ModelForm $form;
    
    public $modalCreate = false;
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

    public function save()
    {
        $this->validate();
        $response = $this->form->store();

        is_null($response)
            ? $this->dispatch('notify', title: 'success', message: 'Model created successfully')
            : $this->dispatch('notify', title: 'error', message: 'Something goes wrong!');

        $this->dispatch('dispatch-model-create-save')->to(ModelTable::class);
    }

    public function render()
    {
        return view('livewire.admin.model.model-create');
    }
}
