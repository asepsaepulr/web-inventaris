<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventory;
use DB;
use Carbon\Carbon;

class ManagementInventory extends Controller
{
    public function store(Request $request)
    {
        // Validate the request...
        // $validated_data = 

        $inventory = new Inventory;
        $inventory->name = $request->name;
        $inventory->inventory_code = $request->inventory_code;
        $inventory->created_by = $request->user_id;
        $inventory->save();

        return redirect()->route('inventory_index')->with('succes','Inventory Berhasil Ditambahkan');

    }

    public function update(Request $request, $id)
    {
        
        $inventory = Inventory::find($id);
        $inventory->name = $request->name;
        $inventory->inventory_code = $request->inventory_code;
        $inventory->save();

        return redirect()->route('inventory_index')->with('succes','Inventory Berhasil Diupdate');
    }

    public function edit_page($id)
    {
        $data = Inventory::where('id', $id)->first();
        return view('inventory.edit', ['inventory' => $data]);
    }

    public function store_index()
    {
        return view('inventory.create');
    }


    public function delete($id)
    {
        Inventory::where('id', $id)->delete();
        return redirect()->back()->with('Inventory Successfully Deleted');
    }

    public function index()
    {
        $inventory = Inventory::all();
        return view('inventory.index', ['inventory' => $inventory]);
    }

    public function details($id)
    {
       $data = Inventory::where('id', $id)->first();
       return view('inventory.details', ['data' => $data]);
    }

    public function search(Request $request)
    {
        $result = Inventory::where('name', 'Like', '%' . $request->search . '%')->get();
        return view('inventory.search', ['result' => $result, 'request' => $request]);
    }
    
}
