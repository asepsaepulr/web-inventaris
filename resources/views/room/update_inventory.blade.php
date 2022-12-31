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
                                    Room Management
                                </h5>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Manage Inventory In Room</li>
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
                <form action="{{ route('room_update_inventory') }}" method="post">
                @csrf

                Room Name: 
                    <select name="room_id">
                        <option value="{{$room_data->room_id}}"> {!! App\Models\Room::where('id', $room_data->room_id)->first()->name; !!} </option>
                    </select>
                </br>

                <input type="hidden" value="{{ $room_data->id }}" name="room_data_id">

                Inventory Name: 
                    <select>
                        <option value="{{$room_data->inventory_id}}"> {!! App\Models\Inventory::where('id', $room_data->inventory_id)->first()->name; !!} </option>
                    </select>


                Quantity: <input name="quantity" type="number" class="form-control" placeholder="quantity" aria-label="quantity" aria-describedby="basic-addon1" value="{{ $room_data->quantity }}">


                Status:
                    <select name="status">
                        @if ($room_data->status) === 1)
                            <option value="1" selected> Good </option>
                            <option value="0"> Out Of Order </option>
                        @else
                            <option value="1"> Good </option>
                            <option value="0" selected> Out Of Order </option>
                        @endif
                    </select>
                </br>

            </div>
        </div>
    </div>
</div>    

<div class="row mb-5">
    <div class="col-lg-12 margin-tb">
        <div class="float-right">
                <button class="btn btn-success" type="submit">
                    <span class="btn-inner">
                        <svg width="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M7.33 2H16.66C20.06 2 22 3.92 22 7.33V16.67C22 20.06 20.07 22 16.67 22H7.33C3.92 22 2 20.06 2 16.67V7.33C2 3.92 3.92 2 7.33 2ZM12.82 12.83H15.66C16.12 12.82 16.49 12.45 16.49 11.99C16.49 11.53 16.12 11.16 15.66 11.16H12.82V8.34C12.82 7.88 12.45 7.51 11.99 7.51C11.53 7.51 11.16 7.88 11.16 8.34V11.16H8.33C8.11 11.16 7.9 11.25 7.74 11.4C7.59 11.56 7.5 11.769 7.5 11.99C7.5 12.45 7.87 12.82 8.33 12.83H11.16V15.66C11.16 16.12 11.53 16.49 11.99 16.49C12.45 16.49 12.82 16.12 12.82 15.66V12.83Z" fill="currentColor"></path>
                        </svg>                        
                    </span>
                    Update Data
                </button>
            </form>
        </div>
    </div>
</div>

@endsection