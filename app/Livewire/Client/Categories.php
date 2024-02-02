<?php

namespace App\Livewire\Client;

use App\Models\Type;
use Livewire\Component;
use App\Models\Category;
use App\Models\SubCategory;

class Categories extends Component
{
    public $sub_categories;
    public $types;

    public function render()
    {
        return view('livewire.client.categories',[
            'categories' => Category::offset(0)
                ->limit(4)
                ->orderBy('id','ASC')
                ->get()
        ]);
    }

    public function fetchSubCategory($id = 0){
        $this->sub_categories = null;
        $this->types = null;
        $data = SubCategory::where('category_id', $id)->get();
        if ($data->count() > 0) {
            $this->sub_categories = $data;
        }
    }

    // Fetch Item types
    public function fetchType($id = 0){
        $this->types = null;
        $data = Type::where('subcategory_id', $id)->get();
        if ($data->count() > 0) {
            $this->types = $data;
        } else {
            return redirect()->route('brand-by-sub-category', [$id]);
        }
    }

    // hide if click outside
    public function hideSubType(){
        $this->sub_categories = null;
        $this->types = null;
    }
}
