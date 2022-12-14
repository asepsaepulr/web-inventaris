@extends('layouts.app')

@section('content')
<div>
  <form method="post" action="{{ route('inventory_create_form') }}"> 
    @csrf
    <h1> Insert New Inventory Data </h1> 

    <div class="input-group mb-3">
      name : <input name="name" type="text" class="form-control" placeholder="name" aria-label="name" aria-describedby="basic-addon1">
    </div>

    <div class="input-group mb-3">
        inventory code : <input name="inventory_code" type="text" class="form-control" placeholder="inventory_code" aria-label="inventory_code" aria-describedby="basic-addon1">
    </div>
    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
    <button> Insert New Data </button> 

  </form> 
</div>
@endsection