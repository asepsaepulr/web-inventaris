@extends('layouts.app')

@section('content')

{{ $room->id }} </br>
{{ $room->name }} </br>
{{ $room->building_name }} </br>

<button> <a href="/room/edit/{{ $room->id }}"> Edit Data </a> </button>

@endsection