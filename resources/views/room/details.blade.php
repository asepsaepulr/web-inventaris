@extends('layouts.app')

@section('content')

<div>
    Room Name : {{ $room->name }} </br>
    Building Name : {{ $room->building_name }} </br>
    Floor : {{ $room->floor }} </br>
    List Inventory : 
    <div class="float-right">
                <a class="btn btn-success" href="{{ route('room_index_inventory') }}"> Add Inventory Into Room </a>
            </div>
    <table class="table"> 
        <thead>
            <tr> 
                <th> Name </th> 
                <th> Quantity </th> 
                <th> Status </th> 
                <th> Action </th>
            </tr>
        </thead>
        <tbody>
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
                    <button> <a href="{{ route('room_update_inventory_page', $data_room->id) }}"> <img src="{{url('/images/edit.png')}}"> </a> </button>   

                    <form action="{{ route('room_inventory_delete', $data_room->id) }}" method="post">
                        @csrf
                        <button type="submit"> <img src="{{url('/images/delete.png')}}"> </button>
                    </form>
                @endguest
            </td> 
        </tr>
        @endforeach
        </tbody>
    </table> 
</div>

<!-- <button> <a href="/room/edit/{{ $room->id }}"> Edit Data </a> </button> -->

@endsection