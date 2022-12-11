@extends('layouts.app')

@section('content')

<table border=1> 
    <tr>
        <th> ID </th>
        <th> Name </th>
        <th> Inventory Code </th>
        <th> Date Created </th>
        <th> Created By </th> 
        <th colspan=2> Action </th>
    </tr> 
    @foreach ($inventory as $data)
    <tr>
        <td> {{$data->id }}</td>
        <td> {{$data->name}} </td>
        <td> {{$data->inventory_code}} </td>
        <td> {{$data->created_at}}</td>
        <td> Created By User </td> 
        <td colspan=2> <button> <a href="/inventory/edit/{{ $data->id }}"> edit </a> </button> <button> <a href="/inventory/details/{{ $data->id }}"> Details </a> </button> <button> <a href="/inventory/delete/{{ $data->id }}"> Delete </a> </button>  </td>
    </tr> 
    @endforeach
</table>
<button> <a href="/inventory/create"> Create New Data </a> </button>
@endsection