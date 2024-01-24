<?php

namespace App\Livewire\Client;

use App\Models\Item;
use Livewire\Component;
use App\Traits\WithSorting;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;

#[Layout('layouts.guest')]
class Items extends Component
{
    use WithPagination;
    use WithSorting;

    public $items;
    public $modalSubMenu = false;
    // Filters
    public $item_name;
    public $model;

    public
        $paginate = 10,
        $sortBy = 'items.id',
        $sortDirection = 'desc';

    public function render()
    {
        $query = Item::query();

        if(isset($this->item_name) && ($this->item_name != null)){
            $query->where('item_name', $this->item_name);
        }
        $items = $query->get();

        return view('livewire.client.items',[
            'items' => $items,
            // $this->items => Item::where('item_name', 'like', '%'.$this->search.'%')
            //     ->with('model')
            //     ->orderBy($this->sortBy, $this->sortDirection)
            //     ->paginate($this->paginate),


            // 'categories' => Category::all()

        ]);
    }

}
