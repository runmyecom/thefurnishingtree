<?php

namespace App\Livewire\Admin\Node;

use App\Models\Node;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Locked;
use App\Livewire\Admin\Node\NodeTable;

class NodeDelete extends Component
{
    #[Locked]
    public $id;

    #[Locked]
    public $name;

    public $modalDelete = false;

    #[On('dispatch-node-table-delete')]
    public function set_node($id, $name)
    {
        $this->id = $id;
        $this->name = $name;

        $this->modalDelete = true;
    }

    public function del()
    {
        $del = Node::destroy($this->id);

        ($del)
        ? $this->dispatch('notify', title: 'success', message: 'Node deleted')
        : $this->dispatch('notify', title: 'error', message: 'Something goes wrong!');
        
        $this->modalDelete = false;

        $this->dispatch('dispatch-node-delete-del')->to(NodeTable::class);
    }

    
    public function render()
    {
        return view('livewire.admin.node.node-delete');
    }
}
