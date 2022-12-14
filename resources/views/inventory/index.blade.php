@extends('layouts.app')

@section('content')

<div>
    <table class="table" style="background-color:white; border-radius:10px;"> 
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
        @foreach ($inventory as $data)
        <tr>
            <td> {{$data->id }}</td>
            <td> {{$data->name}} </td>
            <td> {{$data->inventory_code}} </td>
            <td> {{$data->created_at}}</td>
            <td> Created By User </td> 
            <td colspan=2> 
                <button> <a href="/inventory/details/{{ $data->id }}"> Details </a> </button>
                @guest
                    Not Logged In
                @else
                    <button> <a href="/inventory/edit/{{ $data->id }}"> <img src="{{url('/images/edit.png')}}"> </a> </button>
                    <form action="/inventory/delete/{{ $data->id }}" method="post"> 
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
@guest
    Please login to add new data
@else
    <button> <a href="/inventory/create"> Create New Data </a> </button>
@endguest

@endsection