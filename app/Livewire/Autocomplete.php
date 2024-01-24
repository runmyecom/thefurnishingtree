<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;

class Autocomplete extends Component
{
    public $showdiv = false;
    public $search = "";
    public $records;
    public $empDetails;

    public function searchResult(){

        if(!empty($this->search)){
            $this->records = Category::orderby('name','asc')
                      ->select('*')
                      ->where('name','like','%'.$this->search.'%')
                      ->limit(5)
                      ->get();

            $this->showdiv = true;
        }else{
            $this->showdiv = false;
        }
    }

    // Fetch record by ID
    public function fetchDetailById($id = 0){

        $record = Category::select('*')
                    ->where('id',$id)
                    ->first();

        $this->search = $record->name;
        $this->empDetails = $record;
        $this->showdiv = false;
    }

    public function render()
    {
        return view('livewire.autocomplete');
    }
}
