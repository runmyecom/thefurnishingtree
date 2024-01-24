<?php

namespace App\Livewire\Client;

use App\Models\Size;
use Livewire\Component;
use App\Models\ItemModel;
use Livewire\Attributes\Layout;

#[Layout('layouts.guest')]
class ModelBySize extends Component
{
    public $size;

    public function mount($id)
    {
        $this->size = Size::find($id);
    }

    public
        $paginate = 10,
        $sortBy = 'item_models.id',
        $sortDirection = 'desc';

    public function render()
    {
        $data = ItemModel::where('size_id', $this->size->id)
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate($this->paginate);

        return view('livewire.client.model-by-size', [
            'models' => $data
        ]);
    }
}
