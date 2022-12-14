@extends('layouts.app')

@section('content')
<div>
    <form method="post" action="/room/update/{{ $data->id }}">
    @csrf
    Room Name : <input name="name" type="text" value="{{$data->name}}"> <br>
    Building Name : <input name="building_name" type="text" value="{{$data->building_name}}"> <br> 
    Floor : <input name="floor" type="number" value="{{$data->floor}}">
    </br>
    <button> Update Data </button> 

    </form> 
</div>

@endsection