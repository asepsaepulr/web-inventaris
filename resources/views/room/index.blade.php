@extends('layouts.app')

@section('content')
<table border=1> 
    <tr>
        <th> ID </th>
        <th> Room Name </th>
        <th> Building Name </th>
        <th> Floor </th>
        <th> Last Updated </th> 
        <th colspan=2> Action </th>
    </tr> 
    @foreach ($room as $data)
    <tr>
        <td> {{ $data->id }} </td>
        <td> {{ $data->name }} </td>
        <td> {{ $data->building_name }} </td>
        <td> {{ $data->floor }} </td>
        <td> {{ $data->updated_at }} </td> 
        <td colspan=2> <button> <a href="/room/edit/{{ $data->id }}"> edit </a> </button> <button> <a href="/room/details/{{ $data->id }}"> Details </a> </button> <button> <a href="/room/delete/{{ $data->id }}"> Delete </a> </button>  </td>
    </tr> 
    @endforeach
</table>
<button> <a href="/room/create"> Create New Data </a> </button>
@endsection