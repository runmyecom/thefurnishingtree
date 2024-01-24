<?php

namespace App\Livewire\Admin\Node;

use Livewire\Component;
use App\Models\Category;
use App\Livewire\Forms\NodeForm;
use App\Livewire\Admin\Node\NodeTable;

class NodeCreate extends Component
{
    public NodeForm $form;
    
    public $modalSubCreate = false;
    public $resultDiv = false;
    public $search = "";
    public $results;

    public function searchCategory(){
        if(!empty($this->search)){
            $this->results = Category::orderby('name','asc')
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

        $result = Category::select('*')
                    ->where('id',$id)
                    ->first();

        $this->search = $result->name;
        $this->form->category_id = $result->id;
        $this->resultDiv = false;
    }

    public function save()
    {
        $this->validate();

        $response = $this->form->store();

        is_null($response)
            ? $this->dispatch('notify', title: 'success', message: 'Node created successfully')
            : $this->dispatch('notify', title: 'error', message: 'Something goes wrong!');

        $this->dispatch('dispatch-node-create-save')->to(NodeTable::class);
    }

    public function render()
    {
        return view('livewire.admin.node.node-create');
    }
}
