<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\RoomData;
use App\Models\Inventory;

class RoomDataController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'status' => ['required'],
            'quantity' => ['required','integer'],
            'room_id' => ['required', 'integer'],
            'inventory_id' => ['required', 'integer'],
        ]);


        if (RoomData::where('inventory_id', $request->inventory_id)->exists()){
            return redirect()->back()->with(['error' => 'Inventory Already Exists']);
        } else {

        $roomdata = new RoomData;
        $roomdata->status = $validatedData['status'];
        $roomdata->quantity = $validatedData['quantity'];
        $roomdata->room_id = $validatedData['room_id'];
        $roomdata->inventory_id = $validatedData['inventory_id'];
        $roomdata->save();

        return redirect()->route('room_details', $request->room_id);

        }
    }

    public function index($id)
    {
        $inventory = Inventory::all();
        return view('room.add_inventory', ['inventory' => $inventory, 'room' => $id]);
    }

    public function update_index($id)
    {
        $roomdata = RoomData::where('id', $id)->first();
        return view('room.update_inventory', ['room_data' => $roomdata]);
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'status' => ['required'],
            'quantity' => ['required','integer'],
            'inventory_id' => ['required', 'integer'],            
            'room_id' => ['required', 'integer'],
            'room_data_id' => ['required', 'integer']
        ]);

        
        $roomdata = RoomData::find($validatedData["room_data_id"]);
        $roomdata->status = $validatedData["status"];
        $roomdata->quantity = $validatedData["quantity"];
        $roomdata->inventory_id = $validatedData['inventory_id'];        
        $roomdata->room_id = $validatedData['room_id'];  
        $roomdata->save();

        return redirect()->route('room_details', $request->room_id);
    }

    public function delete($id)
    {
        $roomdata = RoomData::find($id);
        $roomdata->delete();
        return redirect()->back()->with(['success' => 'Inventory Ruangan Berhasil Dihapus']);
    }
}
