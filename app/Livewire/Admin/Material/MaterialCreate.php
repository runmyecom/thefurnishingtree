<?php

namespace App\Livewire\Admin\Material;

use App\Models\Brand;
use Livewire\Component;
use App\Livewire\Forms\MaterialForm;
use App\Livewire\Admin\Material\MaterialTable;

class MaterialCreate extends Component
{
    public MaterialForm $form;
    
    public $modalCreate = false;
    public $resultDiv = false;
    public $search = "";
    public $results;

    public function searchBrand(){
        if(!empty($this->search)){
            $this->results = Brand::orderby('name','asc')
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

        $result = Brand::select('*')
                    ->where('id',$id)
                    ->first();

        $this->search = $result->name;
        $this->form->brand_id = $result->id;
        $this->resultDiv = false;
    }

    public function save()
    {
        // dd($this->form);
        $this->validate();

        $response = $this->form->store();

        is_null($response)
            ? $this->dispatch('notify', title: 'success', message: 'Material created successfully')
            : $this->dispatch('notify', title: 'error', message: 'Something goes wrong!');

        $this->dispatch('dispatch-material-create-save')->to(MaterialTable::class);
    }

    public function render()
    {
        return view('livewire.admin.material.material-create');
    }
}
