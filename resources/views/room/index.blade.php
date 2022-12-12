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
        <td colspan=2>
            <button> <a href="/room/details/{{ $data->id }}"> Details </a> </button>
            @guest

            @else
                <button> <a href="/room/edit/{{ $data->id }}"> edit </a> </button>
                <form action="/room/delete/{{ $data->id }}" method="post">
                    @csrf
                    <button type="submit"> Delete </button>
                </form>
            @endguest
        </td>
    </tr> 
    @endforeach
</table>

@guest
    Please Login To Insert New Data
@else
    <button> <a href="/room/create"> Create New Data </a> </button>
@endguest

@endsection