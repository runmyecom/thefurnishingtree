<?php

namespace App\Livewire\Admin\Color;

use Livewire\Component;
use App\Models\Material;
use App\Livewire\Forms\ColorForm;
use App\Livewire\Admin\Color\ColorTable;

class ColorCreate extends Component
{
    public ColorForm $form;

    public $modalCreate = false;
    public $resultDiv = false;
    public $search = "";
    public $results;

    public function searchParent(){
        if(!empty($this->search)){
            $this->results = Material::orderby('name','asc')
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

        $result = Material::select('*')
                    ->where('id',$id)
                    ->first();

        $this->search = $result->name;
        $this->form->material_id = $result->id;
        $this->resultDiv = false;
    }

    public function save()
    {
        // dd($this->form);
        $this->validate();

        $response = $this->form->store();

        is_null($response)
            ? $this->dispatch('notify', title: 'success', message: 'Color created successfully')
            : $this->dispatch('notify', title: 'error', message: 'Something goes wrong!');

        $this->dispatch('dispatch-color-create-save')->to(ColorTable::class);
    }

    public function render()
    {
        return view('livewire.admin.color.color-create');
    }
}
