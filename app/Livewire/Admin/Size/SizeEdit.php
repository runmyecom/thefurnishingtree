<?php

namespace App\Livewire\Admin\Size;

use App\Models\Size;
use App\Models\Color;
use Livewire\Component;
use Livewire\Attributes\On;
use App\Livewire\Forms\SizeForm;
use App\Livewire\Admin\Size\SizeTable;

class SizeEdit extends Component
{
    public SizeForm $form;

    public $modalEdit = false;
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

    #[On('dispatch-size-table-edit')]
    public function set_size(Size $id)
    {
        $this->form->setSize($id);
        $this->modalEdit = true;
    }

    public function edit()
    {
        $this->validate();
        $update = $this->form->update();

        $this->dispatch('dispatch-size-create-edit')->to(SizeTable::class);

        is_null($update)
            ? $this->dispatch('notify', title: 'success', message: 'Updated successfully')
            : $this->dispatch('notify', title: 'error', message: 'Something goes wrong!');
    }

    public function render()
    {
        return view('livewire.admin.size.size-edit', [
            'colors' => Color::all()
        ]);
    }
}
