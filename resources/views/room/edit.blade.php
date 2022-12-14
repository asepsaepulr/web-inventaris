@extends('layouts.app')

@section('content')
<div>
    <form method="post" action="{{ route('room_update', $data->id) }}">
    @csrf
    Room Name : <input name="name" type="text" value="{{$data->name}}"> <br>
    Building Name : <input name="building_name" type="text" value="{{$data->building_name}}"> <br> 
    Floor : <input name="floor" type="number" value="{{$data->floor}}">
    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
    </br>
    <button> Update Data </button> 

    </form> 
</div>

@endsection