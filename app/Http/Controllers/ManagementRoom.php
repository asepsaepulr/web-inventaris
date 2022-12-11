<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use DB;
use Carbon\Carbon;

class ManagementRoom extends Controller
{
    public function store(Request $request)
    {
        // Validate the request...
        // $validated_data

        DB::table('room')->insert(
        ['name' => $request->input('name'),
        'building_name' => $request->input('building_name'),
        'floor' => $request->input('floor'),
        'created_at' => Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon::now()->toDateTimeString()
    ]);

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
        $update_data = DB::table('room')
              ->where('id', $id)
              ->update(['name' => $request->input('name'),
              'building_name' => $request->input('building_name'),
              'floor' => $request->input('floor'),
              'updated_at' => Carbon::now()->toDateTimeString()
            ]);
        return redirect('/room');
        
    }

    public function index()
    {
        $room = DB::table('room')->get();
        return view('room.index', ['room' => $room]);
    }

    public function details($id)
    {
        $data = Room::where('id', $id)->first();
        return view('room.details', ['room' => $data]);
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
