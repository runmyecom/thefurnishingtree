<?php

namespace App\Livewire\Admin\Node;

use App\Models\Node;
use Livewire\Component;
use App\Traits\WithSorting;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use App\Livewire\Forms\NodeForm;

class NodeTable extends Component
{
    use WithPagination;
    use WithSorting;

    public NodeForm $form;

    public 
        $paginate = 10,
        $sortBy = 'nodes.id',
        $sortDirection = 'desc';

    #[On('dispatch-node-create-save')]
    #[On('dispatch-node-create-edit')]
    #[On('dispatch-node-delete-del')]
    public function render()
    {
        return view('livewire.admin.node.node-table', [
            'data' => Node::where('category_name', 'like', '%'.$this->form->category_name.'%')
                ->where('subcategory_name', 'like', '%'.$this->form->subcategory_name.'%')
                ->where(function ($query) {
                    $query->where('type_name', 'like', '%'.$this->form->type_name.'%')
                        ->orWhereNull('type_name');
                })
                ->with('category')
                ->with('subcategory')
                ->with('type')
                ->orderBy($this->sortBy, $this->sortDirection)
                ->paginate($this->paginate)
        ]);
    }

    // public function render()
    // {
    //     return view('livewire.admin.node.node-table', [
    //         'data' => Node::where('category_name', 'like', '%'.$this->form->category_name.'%')
    //             ->where('subcategory_name', 'like', '%'.$this->form->subcategory_name.'%')
    //             ->where('type_name', 'like', '%'.$this->form->type_name.'%')
    //             ->with('category')
    //             ->with('subcategory')
    //             ->with('type')
    //             ->orderBy($this->sortBy, $this->sortDirection)
    //             ->paginate($this->paginate)
    //     ]);
    // }
}
