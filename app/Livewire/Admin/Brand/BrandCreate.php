<?php

namespace App\Livewire\Admin\Brand;

use App\Models\Node;
use Livewire\Component;
use App\Livewire\Forms\BrandForm;
use App\Livewire\Admin\Brand\BrandTable;

class BrandCreate extends Component
{
    public BrandForm $form;
    
    public $modalSubCreate = false;
    public $resultDiv = false;
    public $search = "";
    public $results;

    public function searchNode(){
        if(!empty($this->search)){
            $this->results = Node::orderby('id','asc')
                      ->select('*')
                      ->where('path','like','%'.$this->search.'%')
                      ->limit(5)
                      ->get();

            $this->resultDiv = true;
        }else{
            $this->resultDiv = false;
        }
    }
    public function fetchNodeByPath($id = 0){

        $result = Node::select('*')
                    ->where('id',$id)
                    ->first();

        $this->search = $result->path;
        $this->form->node_id = $result->id;
        $this->resultDiv = false;
    }

    public function save()
    {
        // dd($this->form);
        $this->validate();

        $response = $this->form->store();

        is_null($response)
            ? $this->dispatch('notify', title: 'success', message: 'Brand created successfully')
            : $this->dispatch('notify', title: 'error', message: 'Something goes wrong!');

        $this->dispatch('dispatch-brand-create-save')->to(BrandTable::class);
    }

    public function render()
    {
        return view('livewire.admin.brand.brand-create');
    }
}
