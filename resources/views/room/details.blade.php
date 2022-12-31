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
                                <li class="breadcrumb-item active" aria-current="page">Room Details</li>
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
                    <div class="table-responsive">
                        <label class="form-label" for="uname">Room Name :</label> : {{ $room->name }} </br>
                        <label class="form-label" for="uname">Building Name :</label> : {{ $room->building_name }} </br>
                        <label class="form-label" for="uname">Floor :</label> : {{ $room->floor }} </br>
                        <label class="form-label" for="uname">List Inventory :</label>
                        <div class="float-right">
                            <a class="btn btn-success" href="{{ route('room_index_inventory') }}"> Add Inventory Into Room </a>
                        </div>
                        <table class="table"> 
                            <thead>
                                <tr> 
                                    <th> Name </th> 
                                    <th> Quantity </th> 
                                    <th> Status </th> 
                                    <th> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($room_data as $data_room)
                            <tr> 
                                <td> {!! App\Models\Inventory::where('id', $data_room->inventory_id)->first()->name; !!} </td>
                                <td> {{ $data_room->quantity }} </td>
                                <td> 
                                    @if ($data_room->status == 1)
                                        <p style="color:green;"> Good </p>
                                    @else
                                        <p style="color:red;"> Out Of Order </p>
                                    @endif
                                </td>
                                <td colspan=2> 
                                    @guest
                                        Not logged In
                                    @else    
                                        <button> <a href="{{ route('room_update_inventory_page', $data_room->id) }}"> <img src="{{url('/images/edit.png')}}"> </a> </button>   

                                        <form action="{{ route('room_inventory_delete', $data_room->id) }}" method="post">
                                            @csrf
                                            <button type="submit"> <img src="{{url('/images/delete.png')}}"> </button>
                                        </form>
                                    @endguest
                                </td> 
                            </tr>
                            @endforeach
                            </tbody>
                        </table> 
                    </div>
                </div>
            </div>
        </div>
    </div>                        
</div>

<!-- <button> <a href="/room/edit/{{ $room->id }}"> Edit Data </a> </button> -->

@endsection