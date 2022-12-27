@extends('layouts.app')

@section('content')

    <div>

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

                                <li class="breadcrumb-item active" aria-current="page">Home Page Inventory</li>

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

                        <table id="user-list-table" class="table table-striped" role="grid" data-toggle="data-table">
                            
                            <thead>

                                <tr class="ligth">

                                    <th>No</th>

                                    <th> Inventory ID </th>

                                    <th> Name </th>

                                    <th> Date Created </th>

                                    <th> Created By </th> 

                                    <th> Action </th>

                                </tr>
                                
                            </thead>

                            <tbody>

                                @foreach ($inventory as $data)

                                <tr>

                                    <td> {{$data->id }}</td>

                                    <td> {{$data->inventory_code}} </td>

                                    <td> {{$data->name}} </td>

                                    <td> {{$data->created_at}}</td>

                                    <td> {!! App\Models\User::where('id', $data->created_by)->first()->name; !!} </td> 

                                    <td colspan=2>

                                        <button> <a href="{{ route('room_details', $data->id) }}"> Details </a> </button>

                                        @guest

                                        @else

                                            <a href="{{ route('room_edit', $data->id) }}"> <img src="{{url('/images/edit.png')}}"> </a>

                                            <form action="{{ route('room_delete', $data->id) }}" method="post">

                                                @csrf

                                                <button type="submit"> <img src="{{url('/images/delete.png')}}"> </button>

                                            </form>

                                        @endguest

                                    </td>

                                    <td>

                                        <form action="{{ route('user.destroy',$data->id) }}" method="POST">

                                            <div class="flex align-items-center list-user-action">

                                            <a class="btn btn-sm btn-icon btn-success" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add" href="#">
                                                <span class="btn-inner">
                                                    <svg width="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" >
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M9.87651 15.2063C6.03251 15.2063 2.74951 15.7873 2.74951 18.1153C2.74951 20.4433 6.01251 21.0453 9.87651 21.0453C13.7215 21.0453 17.0035 20.4633 17.0035 18.1363C17.0035 15.8093 13.7415 15.2063 9.87651 15.2063Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M9.8766 11.886C12.3996 11.886 14.4446 9.841 14.4446 7.318C14.4446 4.795 12.3996 2.75 9.8766 2.75C7.3546 2.75 5.3096 4.795 5.3096 7.318C5.3006 9.832 7.3306 11.877 9.8456 11.886H9.8766Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path d="M19.2036 8.66919V12.6792" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path d="M21.2497 10.6741H17.1597" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    </svg>
                                                </span>
                                            </a>

                                            <a class="btn btn-sm btn-icon btn-warning" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="{{ route('user.edit',$data->id) }}">
                                                <span class="btn-inner">
                                                    <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M11.4925 2.78906H7.75349C4.67849 2.78906 2.75049 4.96606 2.75049 8.04806V16.3621C2.75049 19.4441 4.66949 21.6211 7.75349 21.6211H16.5775C19.6625 21.6211 21.5815 19.4441 21.5815 16.3621V12.3341" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M8.82812 10.921L16.3011 3.44799C17.2321 2.51799 18.7411 2.51799 19.6721 3.44799L20.8891 4.66499C21.8201 5.59599 21.8201 7.10599 20.8891 8.03599L13.3801 15.545C12.9731 15.952 12.4211 16.181 11.8451 16.181H8.09912L8.19312 12.401C8.20712 11.845 8.43412 11.315 8.82812 10.921Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path d="M15.1655 4.60254L19.7315 9.16854" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    </svg>
                                                </span>
                                            </a>

                                            @csrf

                                            @method('DELETE')

                                            <button type="submit" class="btn btn-sm btn-icon btn-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="#">
                                                
                                                <span class="btn-inner">

                                                    <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="currentColor">

                                                        <path d="M19.3248 9.46826C19.3248 9.46826 18.7818 16.2033 18.4668 19.0403C18.3168 20.3953 17.4798 21.1893 16.1088 21.2143C13.4998 21.2613 10.8878 21.2643 8.27979 21.2093C6.96079 21.1823 6.13779 20.3783 5.99079 19.0473C5.67379 16.1853 5.13379 9.46826 5.13379 9.46826" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        
                                                        <path d="M20.708 6.23975H3.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        
                                                        <path d="M17.4406 6.23973C16.6556 6.23973 15.9796 5.68473 15.8256 4.91573L15.5826 3.69973C15.4326 3.13873 14.9246 2.75073 14.3456 2.75073H10.1126C9.53358 2.75073 9.02558 3.13873 8.87558 3.69973L8.63258 4.91573C8.47858 5.68473 7.80258 6.23973 7.01758 6.23973" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    
                                                    </svg>

                                                </span>

                                            </button>

                                            </div>

                                        </form>

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

        <!-- <div class="float-left">

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

                @foreach ($inventory as $data)

                    <tr>

                        <td> {{$data->id }}</td>

                        <td> {{$data->name}} </td>

                        <td> {{$data->inventory_code}} </td>

                        <td> {{$data->created_at}}</td>

                        <td> {!! App\Models\User::where('id', $data->created_by)->first()->name; !!} </td> 

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

        </table> -->

        <div class="row mb-5">

            <div class="col-lg-12 margin-tb">

                    <div class="float-right">

                    <a href="{{ route('inventory_create') }}">

                        <button class="btn btn-success">

                            <span class="btn-inner">

                                <svg width="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M7.33 2H16.66C20.06 2 22 3.92 22 7.33V16.67C22 20.06 20.07 22 16.67 22H7.33C3.92 22 2 20.06 2 16.67V7.33C2 3.92 3.92 2 7.33 2ZM12.82 12.83H15.66C16.12 12.82 16.49 12.45 16.49 11.99C16.49 11.53 16.12 11.16 15.66 11.16H12.82V8.34C12.82 7.88 12.45 7.51 11.99 7.51C11.53 7.51 11.16 7.88 11.16 8.34V11.16H8.33C8.11 11.16 7.9 11.25 7.74 11.4C7.59 11.56 7.5 11.769 7.5 11.99C7.5 12.45 7.87 12.82 8.33 12.83H11.16V15.66C11.16 16.12 11.53 16.49 11.99 16.49C12.45 16.49 12.82 16.12 12.82 15.66V12.83Z" fill="currentColor"></path>
                                
                                </svg>                        

                            </span>

                            Create Inventory

                        </button>

                    </a>

                    </div>

            </div>

        </div>
        
    </div>

@endsection