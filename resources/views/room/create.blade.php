@extends('layouts.app')

@section('content')

<h1> Insert New Room Data </h1> 

<form method="post" action="{{url('/room/create')}}"> 
@csrf


<div class="input-group mb-3">
  name : <input name="name" type="text" class="form-control" placeholder="name" aria-label="name" aria-describedby="basic-addon1">
</div>

<div class="input-group mb-3">
    building_name : <input name="building_name" type="text" class="form-control" placeholder="building_name" aria-label="building_name" aria-describedby="basic-addon1">
</div>

<div class="input-group mb-3">
    floor : <input name="floor" type="number" class="form-control" placeholder="floor" aria-label="floor" aria-describedby="basic-addon1">
</div>

<button> Insert New Data </button> 

</form> 

@endsection