@extends('layouts.app')

@section('content')

<div>
    <form action="/room/add_inventory" method="post">
    @csrf
    <div class="input-group mb-3">
        Room Name: 
            <select name="room_id">
                @foreach ($room as $room_data)
                <option value="{{$room_data->id}}"> {{$room_data->name}} </option>
                @endforeach
            </select>
    </div>

    <div class="input-group mb-3">
        Inventory Name: 
            <select name="inventory_id">
                @foreach ($inventory as $inventory_data)
                <option value="{{$inventory_data->id}}"> {{$inventory_data->name}} </option>
                @endforeach
            </select>
    </div>

    <div class="input-group mb-3">
        Quantity: <input name="quantity" type="number" class="form-control" placeholder="quantity" aria-label="quantity" aria-describedby="basic-addon1">
    </div>

    <div class="input-group mb-3">
        Status:
            <select name="status">
                <option value="1"> Good </option>
                <option value="0"> Out Of Order </option>
            </select>
    </div>

    <button> Insert Inventory Data </button> 

    </form>
</div>

@endsection