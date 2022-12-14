@extends('layouts.app')

@section('content')

<div>
<div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Inventories</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('inventory_create') }}"> Add New Inventory</a>
            </div>
        </div>
</div>
<div class="float-left">
    <form class="d-flex" role="search" action="{{ route('inventory_search') }}" method="post">
        @csrf
        <input class="form-control me-2" type="search" placeholder="Search By Name" aria-label="Search" name="search">
    </form>
</div>
    <table class="table"> 
        <thead>
            <tr>
                <th style="color:#3A57E8;"> ID </th>
                <th style="color:#3A57E8;"> Name </th>
                <th style="color:#3A57E8;"> Inventory Code </th>
                <th style="color:#3A57E8;"> Date Created </th>
                <th style="color:#3A57E8;"> Created By </th> 
                <th colspan=2 style="color:#3A57E8;"> Action </th>
            </tr>
        </thead>
        <tbody>
        @foreach ($result as $data)
        <tr>
            <td> {{$data->id }}</td>
            <td> {{$data->name}} </td>
            <td> {{$data->inventory_code}} </td>
            <td> {{$data->created_at}}</td>
            <td> Created By User </td> 
            <td colspan=2> 
                <button> <a href="{{ route('inventory_details', $data->id) }}"> Details </a> </button>
                @guest
                    Not Logged In
                @else
                    <button> <a href="{{ route('inventory_edit', $data->id) }}"> <img src="{{url('/images/edit.png')}}"> </a> </button>
                    <form action="{{ route('inventory_delete', $data->id) }}" method="post"> 
                        @csrf
                        <button> <img src="{{url('/images/delete.png')}}"> </button>
                    </form>
                @endguest
            </td>
        </tr> 
        @endforeach
        </tbody>
    </table>
</div>

@endsection