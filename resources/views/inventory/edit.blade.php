@extends('layouts.app')

@section('content')

<form method="post" action="/inventory/update/{{ $inventory->id }}">
@csrf
Inventory Name : <input name="name" type="text" value="{{$inventory->name}}"> <br>
Inventory Code : <input name="inventory_code" type="text" value="{{$inventory->inventory_code}}"> <br> 

<button> Update Data </button> 

</form> 
@endsection