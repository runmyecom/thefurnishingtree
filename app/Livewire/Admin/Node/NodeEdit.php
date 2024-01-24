<?php

namespace App\Livewire\Admin\Node;

use App\Models\Node;
use Livewire\Component;
use App\Models\Category;
use Livewire\Attributes\On;
use App\Livewire\Forms\NodeForm;
use App\Livewire\Admin\Node\NodeTable;

class NodeEdit extends Component
{
    public NodeForm $form;

    public $modalEdit = false;
    
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

    #[On('dispatch-node-table-edit')]
    public function set_node(Node $id)
    {
        $this->form->setNode($id);
        $this->modalEdit = true;
    }

    public function edit()
    {
        $this->validate();
        $update = $this->form->update();

        $this->dispatch('dispatch-node-create-edit')->to(NodeTable::class);

        is_null($update)
            ? $this->dispatch('notify', title: 'success', message: 'Updated successfully')
            : $this->dispatch('notify', title: 'error', message: 'Something goes wrong!');
    }

    public function render()
    {
        return view('livewire.admin.node.node-edit');
    }
}
