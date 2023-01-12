@extends('layouts.app') @section('content') 

<div class="row ">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="bd-example">
                    <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <h5 class="fw-bold"> Inventory Management </h5>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">
                            <a class="" href="{{ route('inventory_index') }}"> Home Page Inventory </a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Detail Page Inventory</li>
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
                <form method="post" action="#"> @csrf <div class="row">
                        <div class="form-group col-md-12">
                            <label class="form-label" for="uname">Inventory Name:</label>
                            <input name="name" type="text" class="form-control" placeholder="Name" value="{{$data->name}}" aria-label="name" aria-describedby="basic-addon1">
                        </div>
                        <div class="form-group col-md-12">
                            <label class="form-label" for="uname"> Inventory Code:</label>
                            <input name="inventory_code" type="text" class="form-control" placeholder="Inventory Code" value="{{$data->inventory_code}}" aria-label="inventory_code" aria-describedby="basic-addon1">
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>

<div class="row mb-5">
    <div class="col-lg-12 margin-tb">
        <div class="float-right">
        <a class="btn btn-sm btn-icon" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add" href="{{ route('inventory_edit', $data->id) }}">
        <span class="btn-inner">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M15.5058 6.62458L17.3747 8.49254L15.5058 6.62458ZM16.7076 4.97897L11.6543 10.0323C11.3932 10.293 11.2151 10.6252 11.1426 10.987L10.6758 13.3235L13.0123 12.8558C13.374 12.7835 13.7058 12.6061 13.967 12.3449L19.0203 7.29164C19.1721 7.13979 19.2926 6.95951 19.3748 6.76111C19.457 6.56271 19.4992 6.35006 19.4992 6.13531C19.4992 5.92055 19.457 5.70791 19.3748 5.5095C19.2926 5.3111 19.1721 5.13082 19.0203 4.97897C18.8684 4.82712 18.6882 4.70666 18.4897 4.62448C18.2913 4.5423 18.0787 4.5 17.8639 4.5C17.6492 4.5 17.4365 4.5423 17.2381 4.62448C17.0397 4.70666 16.8595 4.82712 16.7076 4.97897V4.97897Z" stroke="#AEAEB2" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M17.7354 15.0892V17.7363C17.7354 18.2044 17.5495 18.6532 17.2186 18.9842C16.8876 19.3151 16.4387 19.5011 15.9707 19.5011H6.26472C5.79669 19.5011 5.34783 19.3151 5.01688 18.9842C4.68593 18.6532 4.5 18.2044 4.5 17.7363V8.03035C4.5 7.56232 4.68593 7.11345 5.01688 6.7825C5.34783 6.45155 5.79669 6.26563 6.26472 6.26562H8.91181" stroke="#AEAEB2" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </span>
        </a>
        </div>
    </div>
</div> 
@endsection
