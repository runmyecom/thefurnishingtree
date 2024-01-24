<?php

namespace App\Livewire\Admin\SubCategory;

use Livewire\Component;
use App\Livewire\Forms\SubCategoryForm;
use App\Livewire\Admin\SubCategory\SubTable;
use App\Models\Category;

class SubCreate extends Component
{
    public SubCategoryForm $form;
    
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
            ? $this->dispatch('notify', title: 'success', message: 'Sub-Category created successfully')
            : $this->dispatch('notify', title: 'error', message: 'Something goes wrong!');

        $this->dispatch('dispatch-subcategory-create-save')->to(SubTable::class);
    }

    public function render()
    {
        return view('livewire.admin.sub-category.sub-create', [
            'categories' => Category::all()
        ]);
    }
}
