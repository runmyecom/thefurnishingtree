<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use App\Models\Product;
use Livewire\Attributes\Validate;

class ProductForm extends Form
{

    protected $guarded = [];

    // public ?Product $product;

    #[Validate('required|min:5')]
    public $name = '';
    public $dimension = '';
    public $mrp = '';
    public $selling_price = '';
    public $description = '';
    public $category_id = 1;
    public $sub_category_id = 1;
    public $material_id = 1;
    public $design_id = 1;
    public $brand_id = 1;

    // public function generateSlug(Product $product){
    //     $this->product = $product;
    //     $product->title = SlugService::createSlug(Product::class, 'slug', $this->name);
    // }
 
    public function setProduct(Product $product){
        $this->product = $product;
    }

    public function store(){
        $this->validate();
        // dd($this->all());
        Product::create($this->all());
        $this->reset();
    }

    public function update(){
        $this->product->update(
            $this->all()
        );
    }
}
