<?php

namespace App\Livewire\Admin\Color;

use App\Models\Color;
use Livewire\Component;
use App\Models\Material;
use Livewire\Attributes\On;
use App\Livewire\Forms\ColorForm;
use App\Livewire\Admin\Color\ColorTable;

class ColorEdit extends Component
{
    public ColorForm $form;

    public $modalEdit = false;
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

    #[On('dispatch-color-table-edit')]
    public function set_color(Color $id)
    {
        $this->form->setColor($id);
        $this->modalEdit = true;
    }

    public function edit()
    {
        $this->validate();
        $update = $this->form->update();

        $this->dispatch('dispatch-color-create-edit')->to(ColorTable::class);

        is_null($update)
            ? $this->dispatch('notify', title: 'success', message: 'Updated successfully')
            : $this->dispatch('notify', title: 'error', message: 'Something goes wrong!');
    }

    public function render()
    {
        return view('livewire.admin.color.color-edit', [
            'materials' => Material::all()
        ]);
    }
}
