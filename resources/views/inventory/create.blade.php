@extends('layouts.app')

@section('content')
<form method="post" action="{{url('/inventory/create')}}"> 
@csrf
<h1> Insert New Inventory Data </h1> 

<div class="input-group mb-3">
  name : <input name="name" type="text" class="form-control" placeholder="name" aria-label="name" aria-describedby="basic-addon1">
</div>

<div class="input-group mb-3">
    inventory code : <input name="inventory_code" type="number" class="form-control" placeholder="inventory_code" aria-label="inventory_code" aria-describedby="basic-addon1">
</div>

<button> Insert New Data </button> 

</form> 
@endsection