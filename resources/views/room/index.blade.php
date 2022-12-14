@extends('layouts.app')

@section('content')
<div>
<table class="table" style="background-color:white;border-radius:10px;"> 
    <tr>
        <th style="color:#3A57E8;"> ID </th>
        <th style="color:#3A57E8;"> Room Name </th>
        <th style="color:#3A57E8;"> Building Name </th>
        <th style="color:#3A57E8;"> Floor </th>
        <th style="color:#3A57E8;"> Last Updated </th> 
        <th colspan=2 style="color:#3A57E8;"> Action </th>
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
                <a href="/room/edit/{{ $data->id }}"> <img src="{{url('/images/edit.png')}}"> </a>
                <form action="/room/delete/{{ $data->id }}" method="post">
                    @csrf
                    <button type="submit"> <img src="{{url('/images/delete.png')}}"> </button>
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

<div>
@endsection