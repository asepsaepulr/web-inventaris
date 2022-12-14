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
        $roomdata = new RoomData;
        $roomdata->status = $request->status;
        $roomdata->quantity = $request->quantity;
        $roomdata->room_id = $request->room_id;
        $roomdata->inventory_id = $request->inventory_id;
        $roomdata->save();

        return redirect()->route('room_index')->with('succes','Inventory Ruangan Berhasil Ditambahkan');
    }

    public function index()
    {
        $inventory = Inventory::all();
        $room = Room::all();
        return view('room.add_inventory', ['inventory' => $inventory, 'room' => $room]);
    }

    public function update_index($id)
    {
        $roomdata = RoomData::where('id', $id)->first();
        return view('room.update_inventory', ['room_data' => $roomdata]);
    }

    public function update(Request $request)
    {
        foreach ($request as $data){ 
            $roomdata = RoomData::find($request->room_data_id);
            $roomdata->status = $request->status;
            $roomdata->quantity = $request->quantity;
            $roomdata->save();
        }
        return redirect()->route('room_index')->with('succes','Inventory Ruangan Berhasil Di Update');
    }

    public function delete($id)
    {
        $roomdata = RoomData::find($id);
        $roomdata->delete();
        return redirect()->route('room_index')->with('succes','Inventory Ruangan Berhasil Dihapus');
    }
}
