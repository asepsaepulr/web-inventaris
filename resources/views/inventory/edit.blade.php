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
                            <li class="breadcrumb-item active" aria-current="page">Update Inventory</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-xl-8 col-lg-8">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <div class="header-title">
                <h4 class="card-title"></h4>
            </div>
        </div>
        <div class="card-body">
            <div class="new-user-info">
                <form method="post" action="{{ route('inventory_edit_post', $inventory->id) }}">
                     @csrf
                        <div class="row">
                        <div class="form-group col-md-12">
                            <label class="form-label" for="uname">Inventory Name:</label>
                            <input name="name" type="text" class="form-control" placeholder="Name" value="{{$inventory->name}}" aria-label="name" aria-describedby="basic-addon1">
                        </div>
                        <div class="form-group col-md-12">
                            <label class="form-label" for="uname"> Inventory Code:</label>
                            <input name="inventory_code" type="text" class="form-control" placeholder="Inventory Code" value="{{$inventory->inventory_code}}" aria-label="inventory_code" aria-describedby="basic-addon1">
                        </div>
                    </div>
                </div>
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
