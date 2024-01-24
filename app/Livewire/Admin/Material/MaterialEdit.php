<?php

namespace App\Livewire\Admin\Material;

use App\Models\Brand;
use Livewire\Component;
use App\Models\Material;
use App\Models\SubCategory;
use Livewire\Attributes\On;
use App\Livewire\Forms\MaterialForm;

class MaterialEdit extends Component
{
    public MaterialForm $form;

    public $modalEdit = false;
    public $resultDiv = false;
    public $search = "";
    public $results;

    public function searchBrand(){
        if(!empty($this->search)){
            $this->results = Brand::orderby('id','asc')
                      ->select('*')
                      ->where('name','like','%'.$this->search.'%')
                      ->limit(5)
                      ->get();

            $this->resultDiv = true;
        }else{
            $this->resultDiv = false;
        }
    }
    public function fetchById($id = 0){

        $result = Brand::select('*')
                    ->where('id',$id)
                    ->first();

        $this->search = $result->path;
        $this->form->brand_id = $result->id;
        $this->resultDiv = false;
    }

    #[On('dispatch-material-table-edit')]
    public function set_material(Material $id)
    {
        $this->form->setMaterial($id);
        $this->modalEdit = true;
    }

    public function edit()
    {
        $this->validate();
        $update = $this->form->update();

        $this->dispatch('dispatch-material-create-edit')->to(MaterialTable::class);

        is_null($update)
            ? $this->dispatch('notify', title: 'success', message: 'Updated successfully')
            : $this->dispatch('notify', title: 'error', message: 'Something goes wrong!');
    }

    public function render()
    {
        return view('livewire.admin.material.material-edit', [
            'brands' => Brand::all()
        ]);
    }
}
