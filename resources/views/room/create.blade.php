@extends('layouts.app')

@section('content')

<div>
  <h1> Insert New Room Data </h1> 

  <form method="post" action="{{ route('room_create_form') }}"> 
  @csrf

  <div class="input-group mb-3">
    name : <input name="name" type="text" class="form-control" placeholder="name" aria-label="name" aria-describedby="basic-addon1">
  </div>

  <div class="input-group mb-3">
      building_name : <input name="building_name" type="text" class="form-control" placeholder="building_name" aria-label="building_name" aria-describedby="basic-addon1">
  </div>

  <div class="input-group mb-3">
      floor : <input name="floor" type="text" class="form-control" placeholder="floor" aria-label="floor" aria-describedby="basic-addon1">
  </div>

  <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">


  <button> Insert New Data </button> 

  </form> 
</div>

@endsection