<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventory;

class InventoryController extends Controller
{
    public function index(){
        
        $inventories = Inventory::latest();

        if(request('search')){
            $inventories->where('title', 'like', '%' . request('search') . '%')
            ->orWhere('desc', 'like', '%' . request('search') . '%');
        }

        return view('inventories',[
            "title" => "Inventories",
            "inventories" => $inventories->get()
        ]);
    }

    public function show(Inventory $inventory){
        return view('inventory',[
            "title" => "Inventory",
            "inventory" => $inventory
        ]);
    }
}
