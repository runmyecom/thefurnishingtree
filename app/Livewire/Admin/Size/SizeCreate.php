<?php

namespace App\Livewire\Admin\Size;

use App\Models\Color;
use Livewire\Component;
use App\Livewire\Forms\SizeForm;
use App\Livewire\Admin\Size\SizeTable;

class SizeCreate extends Component
{
    public SizeForm $form;
    
    public $modalCreate = false;
    public $resultDiv = false;
    public $search = "";
    public $results;

    public function searchParent(){
        if(!empty($this->search)){
            $this->results = Color::orderby('name','asc')
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
        $result = Color::select('*')
                    ->where('id',$id)
                    ->first();

        $this->search = $result->name;
        $this->form->color_id = $result->id;
        $this->resultDiv = false;
    }

    public function save()
    {
        $this->validate();
        $response = $this->form->store();

        is_null($response)
            ? $this->dispatch('notify', title: 'success', message: 'Size created successfully')
            : $this->dispatch('notify', title: 'error', message: 'Something goes wrong!');

        $this->dispatch('dispatch-size-create-save')->to(SizeTable::class);
    }

    public function render()
    {
        return view('livewire.admin.size.size-create');
    }
}
