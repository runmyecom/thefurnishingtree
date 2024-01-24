<?php

namespace App\Livewire\Admin\Node;

use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.admin')] 
class NodeIndex extends Component
{
    public function render()
    {
        return view('livewire.admin.node.node-index');
    }
}
