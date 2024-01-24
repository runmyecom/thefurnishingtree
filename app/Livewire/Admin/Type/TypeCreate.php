<?php

namespace App\Livewire\Admin\Type;

use Livewire\Component;
use App\Models\SubCategory;
use App\Livewire\Forms\TypeForm;

class TypeCreate extends Component
{
    public TypeForm $form;
    
    public $modalTypeCreate = false;
    public $resultDiv = false;
    public $search = "";
    public $results;

    public function searchCategory(){
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

    public function save()
    {
        // dd($this->form);
        $this->validate();

        $response = $this->form->store();

        is_null($response)
            ? $this->dispatch('notify', title: 'success', message: 'Sub-Category created successfully')
            : $this->dispatch('notify', title: 'error', message: 'Something goes wrong!');

        $this->dispatch('dispatch-type-create-save')->to(TypeTable::class);
    }

    public function render()
    {
        return view('livewire.admin.type.type-create', [
            'subcategories' => SubCategory::all()
        ]);
    }
}
