@extends('layouts.app')

@section('content')
<div>
<div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Rooms</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('room_create') }}"> Create New Room</a>
            </div>
        </div>
</div>

@if ($message = Session::get('succes'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif
<div class="float-left">
    <form class="d-flex" role="search" action="{{ route('room_search') }}" method="post">
        @csrf
        <input class="form-control me-2" type="search" placeholder="Search By Name" aria-label="Search" name="search">
    </form>
</div>
<table class="table">
  <thead>
    <tr>
        <th> ID </th>
        <th> Room Name </th>
        <th> Building Name </th>
        <th> Floor </th>
        <th> Last Updated </th> 
        <th colspan=2> Action </th>
    </tr>
  </thead>
    <tbody>
    @foreach ($result as $data)
    <tr>
        <td> {{ $data->id }} </td>
        <td> {{ $data->name }} </td>
        <td> {{ $data->building_name }} </td>
        <td> {{ $data->floor }} </td>
        <td> {{ $data->updated_at }} </td> 
        <td colspan=2>
            <button> <a href="{{ route('room_details', $data->id) }}"> Details </a> </button>
            @guest

            @else
                <a href="{{ route('room_edit', $data->id) }}"> <img src="{{url('/images/edit.png')}}"> </a>
                <form action="{{ route('room_delete', $data->id) }}" method="post">
                    @csrf
                    <button type="submit"> <img src="{{url('/images/delete.png')}}"> </button>
                </form>
            @endguest
        </td>
    </tr>
    @endforeach
  </tbody>
</table>

<div>
@endsection