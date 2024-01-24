<?php

namespace App\Livewire\Client;

use App\Models\Size;
use App\Models\Color;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.guest')]
class SizeByColor extends Component
{
    public $color;

    public function mount($id)
    {
        $this->color = Color::find($id);
    }

    public
        $paginate = 10,
        $sortBy = 'sizes.id',
        $sortDirection = 'desc';

    public function render()
    {
        $data = Size::where('color_id', $this->color->id)
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate($this->paginate);

        return view('livewire.client.size-by-color', [
            'sizes' => $data
        ]);
    }
}
