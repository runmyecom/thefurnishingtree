<?php

namespace App\Livewire\Client;

use App\Models\Color;
use Livewire\Component;
use App\Models\Material;
use Livewire\Attributes\Layout;

#[Layout('layouts.guest')]
class ColorByMaterial extends Component
{
    public $material;

    public function mount($id)
    {
        $this->material = Material::find($id);
    }

    public
        $paginate = 10,
        $sortBy = 'colors.id',
        $sortDirection = 'desc';

    public function render()
    {
        $data = Color::where('material_id', $this->material->id)
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate($this->paginate);

        return view('livewire.client.color-by-material', [
            'colors' => $data
        ]);
    }
}
