@extends('layouts.app')

@section('content')

<form action="{{ route('room_update_inventory') }}" method="post">
@csrf

Room Name: 
    <select name="room_id">
        <option value="{{$room_data->room_id}}"> {!! App\Models\Room::where('id', $room_data->room_id)->first()->name; !!} </option>
    </select>
</br>

<input type="hidden" value="{{ $room_data->id }}" name="room_data_id">

Inventory Name: 
    <select>
        <option value="{{$room_data->inventory_id}}"> {!! App\Models\Inventory::where('id', $room_data->inventory_id)->first()->name; !!} </option>
    </select>


Quantity: <input name="quantity" type="number" class="form-control" placeholder="quantity" aria-label="quantity" aria-describedby="basic-addon1" value="{{ $room_data->quantity }}">


Status:
    <select name="status">
        @if ($room_data->status) === 1)
            <option value="1" selected> Good </option>
            <option value="0"> Out Of Order </option>
        @else
            <option value="1"> Good </option>
            <option value="0" selected> Out Of Order </option>
        @endif
    </select>
</br>

<button> Update Inventory Data </button> 

</form>

@endsection