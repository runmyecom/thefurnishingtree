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
    public $resultDiv = false;
    public $search = "";
    public $results;

    public function searchSubCategory(){
        if(!empty($this->search)){
            $this->results = SubCategory::orderby('name','asc')
                      ->select('*')
                      ->where('name','like','%'.$this->search.'%')
                      ->limit(5)
                      ->get();

            $this->resultDiv = true;
        }else{
            $this->resultDiv = false;
        }
    }
    public function fetchDetailById($id = 0){
        $result = SubCategory::select('*')
                    ->where('id',$id)
                    ->first();

        $this->search = $result->name;
        $this->form->subcategory_id = $result->id;
        $this->resultDiv = false;
    }

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
        $this->form->reset();
        $this->search = "";
        // $this->modalEdit = false;

        $this->dispatch('dispatch-type-create-edit')->to(TypeTable::class);

        is_null($update)
            ? $this->dispatch('notify', title: 'success', message: 'Updated successfully')
            : $this->dispatch('notify', title: 'error', message: 'Something goes wrong!');
    }

    public function render()
    {
        return view('livewire.admin.type.type-edit');
    }
}
