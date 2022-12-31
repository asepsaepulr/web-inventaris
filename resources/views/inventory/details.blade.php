@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="bd-example">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <h5 class="fw-bold">
                                    Inventory Management
                                </h5>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Details Inventory</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body px-0">
                {{$data->id}} <br>
                {{$data->name}} <br>
                {{$data->inventory_code}} <br> 

                @guest
                    Please Login to Edit Data
                @else
                    <button> <a href="{{ route('inventory_edit', $data->id) }}"> <img src="{{url('/images/edit.png')}}"> </a> </button>
                @endguest
            </div>
        </div>
    </div>
</div>                  
@endsection