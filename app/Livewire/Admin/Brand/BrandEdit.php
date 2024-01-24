<?php

namespace App\Livewire\Admin\Brand;

use App\Models\Node;
use App\Models\Brand;
use Livewire\Component;
use Livewire\Attributes\On;
use App\Livewire\Forms\BrandForm;
use App\Livewire\Admin\Brand\BrandTable;

class BrandEdit extends Component
{
    public BrandForm $form;

    public $modalEdit = false;
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

    #[On('dispatch-brand-table-edit')]
    public function set_brand(Brand $id)
    {
        $this->form->setBrand($id);
        $this->modalEdit = true;
    }

    public function edit()
    {
        $this->validate();
        $update = $this->form->update();

        $this->dispatch('dispatch-brand-create-edit')->to(BrandTable::class);

        is_null($update)
            ? $this->dispatch('notify', title: 'success', message: 'Updated successfully')
            : $this->dispatch('notify', title: 'error', message: 'Something goes wrong!');
    }

    public function render()
    {
        return view('livewire.admin.brand.brand-edit',[
            'nodes' => Node::all()
        ]);
    }
}
