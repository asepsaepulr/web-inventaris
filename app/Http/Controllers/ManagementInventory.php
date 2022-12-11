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

        DB::table('inventory')->insert(
            ['name' => $request->input('name'),
            'inventory_code' => $request->input('inventory_code'),
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString()]
        );

        return redirect()->back()->with('Inventory Successfully Created');

    }

    public function update(Request $request, $id)
    {
        $update_data = DB::table('inventory')
              ->where('id', $id)
              ->update(['name' => $request->input('name'),
              'inventory_code' => $request->input('inventory_code'),
              'updated_at' => Carbon::now()->toDateTimeString()
            ]);

        return redirect('/inventory');
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


    
}
