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
        <a class="btn btn-sm btn-icon btn-success" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add" href="{{ route('inventory_edit', $data->id) }}">
        <span class="btn-inner">
        <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M11.4925 2.78906H7.75349C4.67849 2.78906 2.75049 4.96606 2.75049 8.04806V16.3621C2.75049 19.4441 4.66949 21.6211 7.75349 21.6211H16.5775C19.6625 21.6211 21.5815 19.4441 21.5815 16.3621V12.3341" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
            <path fill-rule="evenodd" clip-rule="evenodd" d="M8.82812 10.921L16.3011 3.44799C17.2321 2.51799 18.7411 2.51799 19.6721 3.44799L20.8891 4.66499C21.8201 5.59599 21.8201 7.10599 20.8891 8.03599L13.3801 15.545C12.9731 15.952 12.4211 16.181 11.8451 16.181H8.09912L8.19312 12.401C8.20712 11.845 8.43412 11.315 8.82812 10.921Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
            <path d="M15.1655 4.60254L19.7315 9.16854" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>                     <path fill-rule="evenodd" clip-rule="evenodd" d="M7.81 2H16.191C19.28 2 21 3.78 21 6.83V17.16C21 20.26 19.28 22 16.191 22H7.81C4.77 22 3 20.26 3 17.16V6.83C3 3.78 4.77 2 7.81 2ZM8.08 6.66V6.65H11.069C11.5 6.65 11.85 7 11.85 7.429C11.85 7.87 11.5 8.22 11.069 8.22H8.08C7.649 8.22 7.3 7.87 7.3 7.44C7.3 7.01 7.649 6.66 8.08 6.66ZM8.08 12.74H15.92C16.35 12.74 16.7 12.39 16.7 11.96C16.7 11.53 16.35 11.179 15.92 11.179H8.08C7.649 11.179 7.3 11.53 7.3 11.96C7.3 12.39 7.649 12.74 8.08 12.74ZM8.08 17.31H15.92C16.319 17.27 16.62 16.929 16.62 16.53C16.62 16.12 16.319 15.78 15.92 15.74H8.08C7.78 15.71 7.49 15.85 7.33 16.11C7.17 16.36 7.17 16.69 7.33 16.95C7.49 17.2 7.78 17.35 8.08 17.31Z" fill="currentColor"></path>                            </svg>
        </span>
        </a>
        </div>
    </div>
</div> @endsection
