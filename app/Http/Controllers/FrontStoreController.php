<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Node;
use Illuminate\Http\Request;

class FrontStoreController extends Controller
{
    public function brandsByType($type){
        $node = Node::where('type_name', $type)->firstOrFail();
        $brands = Item::where('node_id', $node->id)
            ->select('brand')
            ->groupBy('brand')
            ->get();
        $type_name = $type;
        return view('frontstore.brands-by-type', compact('brands', 'type_name'));
    }
}
