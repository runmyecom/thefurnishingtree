<?php

namespace App\Livewire\Client;

use App\Models\Item;
use App\Models\Brand;
use Livewire\Component;
use App\Models\Material;
use Livewire\Attributes\Layout;

#[Layout('layouts.guest')]
class MaterialByBrand extends Component
{

    public
        $paginate = 10,
        $sortBy = 'materials.id',
        $sortDirection = 'desc';

    public function render()
    {
        // $data = Material::where('brand_id', $this->brand->id)
        //     ->orderBy($this->sortBy, $this->sortDirection)
        //     ->paginate($this->paginate);

        $data = Item::where('material', 'nylone')
            ->select('material')
            ->groupBy('material')
            ->get();

        return view('livewire.client.material-by-brand', [
            'materials' => $data
        ]);
    }
}
