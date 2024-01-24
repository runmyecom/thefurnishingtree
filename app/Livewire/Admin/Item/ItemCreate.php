<?php

namespace App\Livewire\Admin\Item;

use Livewire\Component;
use App\Models\Category;
use App\Livewire\Forms\ItemForm;
use App\Livewire\Admin\Item\ItemTable;

class ItemCreate extends Component
{
    public ItemForm $form;
    
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
        // dd($this->form);
        $this->validate();

        $response = $this->form->store();

        is_null($response)
            ? $this->dispatch('notify', title: 'success', message: 'Item created successfully')
            : $this->dispatch('notify', title: 'error', message: 'Something goes wrong!');

        $this->dispatch('dispatch-item-create-save')->to(ItemTable::class);
    }

    public function render()
    {
        return view('livewire.admin.item.item-create', [
            'categories' => Category::all()
        ]);
    }
}
