@extends('layouts.app')

@section('content')

Room Name : {{ $room->name }} </br>
Building Name : {{ $room->building_name }} </br>
Floor : {{ $room->floor }} </br>
List Inventory : 
<table border=1> 
    <tr> 
        <th> Name </th> 
        <th> Quantity </th> 
        <th> Status </th> 
        <th> Action </th>
    </tr>
    @foreach ($room_data as $data_room)
    <tr> 
        <td> {!! App\Models\Inventory::where('id', $data_room->inventory_id)->first()->name; !!} </td>
        <td> {{ $data_room->quantity }} </td>
        <td> 
            @if ($data_room->status == 1)
                <p style="color:green;"> Good </p>
            @else
                <p style="color:red;"> Out Of Order </p>
            @endif
        </td>
        <td colspan=2> 
            @guest
                Not logged In
            @else    
                <button> <a href="/room/inventory/edit/{{ $data_room->id }}"> Edit </a> </button>   

                <form action="/room/inventory/delete/{{ $data_room->id }}" method="post">
                    @csrf
                    <button type="submit"> Delete </button>
                </form>
            @endguest
        </td> 
    </tr>
    @endforeach
</table> 


<!-- <button> <a href="/room/edit/{{ $room->id }}"> Edit Data </a> </button> -->

@endsection