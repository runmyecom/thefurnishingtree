<?php

namespace App\Livewire\Client;

use App\Models\Brand;
use Livewire\Component;
use App\Models\Material;
use Livewire\Attributes\Layout;

#[Layout('layouts.guest')]
class MaterialByBrand extends Component
{
    public $brand;

    public function mount($id)
    {
        $this->brand = Brand::find($id);
    }

    public
        $paginate = 10,
        $sortBy = 'materials.id',
        $sortDirection = 'desc';

    public function render()
    {
        $data = Material::where('brand_id', $this->brand->id)
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate($this->paginate);

        return view('livewire.client.material-by-brand', [
            'materials' => $data
        ]);
    }
}
