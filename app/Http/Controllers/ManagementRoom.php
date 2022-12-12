<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\RoomData;
use App\Models\Inventory;

use Carbon\Carbon;

class ManagementRoom extends Controller
{
    public function store(Request $request)
    {
        // Validate the request...
        // $validated_data

        $room = New Room;
        $room->name = $request->name;
        $room->building_name = $request->building_name;
        $room->floor = $request->floor;
        $room->save();

        return redirect()->back()->with('Room Successfully Created');
    }

    public function store_create(Request $request)
    {
        return view('room.create');
    }

    public function delete(Request $request)
    {
        Room::where('id', $request['id'])->delete();
        return redirect('/room');
    }

    public function update(Request $request, $id)
    {
        $update_data = Room::find($id);
        $update_data->name = $request->name;
        $update_data->building_name = $request->building_name;
        $update_data->floor = $request->floor;
        $update_data->save();

        return redirect('/room');
        
    }

    public function index()
    {
        $room = Room::all();
        return view('room.index', ['room' => $room]);
    }

    public function details($id)
    {
        $data = Room::where('id', $id)->first();
        $room_data = RoomData::where('room_id', $id)->get();
        return view('room.details', ['room' => $data, "room_data" => $room_data]);
    }

    public function store_index()
    {
        return view('room.create');
    }

    public function edit_page($id)
    {
        $data = Room::where('id', $id)->first();
        return view('room.edit', ['data' => $data]);
    }
}
