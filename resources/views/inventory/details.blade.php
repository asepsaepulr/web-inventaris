@extends('layouts.app')

@section('content')

{{$data->id}} <br>
{{$data->name}} <br>
{{$data->inventory_code}} <br> 

<button> <a href="/inventory/edit/{{ $data->id }}"> Edit Data </a> </button>
@endsection