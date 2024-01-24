<?php

namespace App\Livewire\Client;

use App\Models\Item;
use App\Models\Node;
use App\Models\Size;
use App\Models\Type;
use App\Models\Brand;
use App\Models\Color;
use Livewire\Component;
use App\Models\Category;
use App\Models\Material;
use App\Models\ItemModel;
use App\Models\SubCategory;

class MegaMenu extends Component
{
    public $modalSubMenu = false;
    public $search;
    public $sub_categories;
    public $types;
    public $brands;
    public $materials;
    public $colors;
    public $sizes;
    public $models;

    public function render()
    {
        return view('livewire.client.mega-menu',[
            'categories' => Category::all()
        ]);
    }

    // Fetch Sub-Category
    public function fetchSubCategory($id = 0){
        $data = SubCategory::where('category_id', $id)->get();
        $this->sub_categories = $data;
    }

    // Fetch Item types
    public function fetchType($id = 0){
        $data = Type::where('subcategory_id', $id)->get();
        if ($data->count() > 0) {
            $this->types = $data;
            $this->brands = null;
        } else {
            $nodes = Node::where('subcategory_id', $id)->get();
            if ($nodes->count() > 0) {
                $brandId = [];
                foreach ($nodes as $node) {
                    array_push($brandId, $node->brand_id);
                    $data = Brand::where('node_id', $node->id)->get();
                    $this->brands = $data;
                }
            }else{
                $this->brands = null;
            }
        }
    }

    // Fetch Brands
    public function fetchBrand($id = 0){
        $nodes = Node::where('type_id', $id)->get();

        if ($nodes->count() > 0) {
            $brandId = [];
            foreach ($nodes as $node) {
                array_push($brandId, $node->brand_id);
                // dd($node->id);

                $data = Brand::where('node_id', $node->id)->get();
                $this->brands = $data;
            }
            // $this->brands = Brand::find(implode(',',$brandId));
        }else{
            $this->brands = null;
        }
    }
    // Fetch Material
    public function fetchMaterial($id = 0){
        $data = Material::where('brand_id', $id)->get();
        $this->materials = $data;
    }
    // Fetch Colors
    public function fetchColor($id = 0){
        $data = Color::where('material_id', $id)->get();
        $this->colors = $data;
    }
    // Fetch Sizes
    public function fetchSize($id = 0){
        $data = Size::where('color_id', $id)->get();
        $this->sizes = $data;
    }
    // Fetch Model
    public function fetchModel($id = 0){
        $data = ItemModel::where('size_id', $id)->get();
        $this->models = $data;
    }
    // Fetch Items
    public function fetchItem($id = 0){
        $data = Item::where('model_id', $id)
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate($this->paginate);
    }

}
