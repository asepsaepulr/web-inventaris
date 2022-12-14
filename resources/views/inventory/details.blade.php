@extends('layouts.app')

@section('content')

<div>
    {{$data->id}} <br>
    {{$data->name}} <br>
    {{$data->inventory_code}} <br> 

    @guest
        Please Login to Edit Data
    @else
        <button> <a href="/inventory/edit/{{ $data->id }}"> <img src="{{url('/images/edit.png')}}"> </a> </button>
    @endguest
</div>
@endsection