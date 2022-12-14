@extends('layouts.app')

@section('content')

<div>
    <form method="post" action="{{ route('inventory_edit_post', $inventory->id) }}">
    @csrf
    Inventory Name : <input name="name" type="text" value="{{$inventory->name}}"> <br>
    Inventory Code : <input name="inventory_code" type="text" value="{{$inventory->inventory_code}}"> <br> 

    <button> Update Data </button> 

    </form> 
</div>
@endsection