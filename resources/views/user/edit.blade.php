@extends('layouts.app')

@section('content')

   @if ($message = Session::get('error'))

      <div class="row">

         <div class="col-lg-12">

            <div class="bd-example">

            <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">

               <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">

                  <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
               
               </symbol>

            </svg>

            <div class="alert alert-solid alert-danger rounded-0 alert-dismissible fade show " role="alert">

                  <svg class="bi flex-shrink-0 me-2" width="24" height="24">

                     <use xlink:href="#exclamation-triangle-fill" />

                  </svg>

                  <span>{{ $message }}</span>

                  <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>

            </div>

            </div>

         </div>

      </div>

   @elseif ($errors->any())

      <div class="row">

         <div class="col-lg-12">

            <div class="bd-example">

            <div class="alert alert-solid alert-danger rounded-0 alert-dismissible fade show " role="alert">

               <ul>

                  @foreach ($errors->all() as $error)

                     <li>{{ $error }}</li>

                  @endforeach

               </ul>

               <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>

            </div>

            </div>

         </div>

      </div>

   @endif

   <div class="row ">

      <div class="col-sm-12">

            <div class="card">

               <div class="card-body">

                  <div class="bd-example">

                     <nav aria-label="breadcrumb">

                        <ol class="breadcrumb">

                           <li class="breadcrumb-item">

                              <h5 class="fw-bold"> Users Management </h5>

                           </li>

                           <li class="breadcrumb-item" aria-current="page">
                           
                              <a class="" href="{{ route('user.index') }}"> Home Page Users </a>
                           
                           </li>

                           <li class="breadcrumb-item active" aria-current="page">Edit Page Users</li>

                        </ol>

                     </nav>

                  </div>

               </div>

            </div>

      </div>

   </div>

   <div class="row">

      <div class="col-xl-3 col-lg-4">
         <div class="card">
            <div class="card-header d-flex justify-content-between">
               <div class="header-title">
                  <h4 class="card-title">Add New User</h4>
               </div>
            </div>
            <div class="card-body">
               <form>
                  <div class="form-group">
                     <div class="profile-img-edit position-relative">
                        <img src="{{ asset('images/avatars/01.png') }}" alt="profile-pic" class="theme-color-default-img profile-pic rounded avatar-100">
                        <img src="{{ asset('images/avatars/avtar_1.png') }}" alt="profile-pic" class="theme-color-purple-img profile-pic rounded avatar-100">
                        <img src="{{ asset('images/avatars/avtar_2.png') }}" alt="profile-pic" class="theme-color-blue-img profile-pic rounded avatar-100">
                        <img src="{{ asset('images/avatars/avtar_4.png') }}" alt="profile-pic" class="theme-color-green-img profile-pic rounded avatar-100">
                        <img src="{{ asset('images/avatars/avtar_5.png') }}" alt="profile-pic" class="theme-color-yellow-img profile-pic rounded avatar-100">
                        <img src="{{ asset('images/avatars/avtar_3.png') }}" alt="profile-pic" class="theme-color-pink-img profile-pic rounded avatar-100">
                        <div class="upload-icone bg-primary">
                           <svg class="upload-button" width="14" height="14" viewBox="0 0 24 24">
                              <path fill="#ffffff" d="M14.06,9L15,9.94L5.92,19H5V18.08L14.06,9M17.66,3C17.41,3 17.15,3.1 16.96,3.29L15.13,5.12L18.88,8.87L20.71,7.04C21.1,6.65 21.1,6 20.71,5.63L18.37,3.29C18.17,3.09 17.92,3 17.66,3M14.06,6.19L3,17.25V21H6.75L17.81,9.94L14.06,6.19Z" />
                           </svg>
                           <input class="file-upload" type="file" accept="image/*">
                        </div>
                     </div>
                     <div class="img-extension mt-3">
                        <div class="d-inline-block align-items-center">
                           <span>Only</span>
                           <a href="javascript:void();">.jpg</a>
                           <a href="javascript:void();">.png</a>
                           <a href="javascript:void();">.jpeg</a>
                           <span>allowed</span>
                        </div>
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="form-label">User Role:</label>
                     <select name="type" class="selectpicker form-control" data-style="py-0" disabled>
                        <option>Staff</option>
                     </select>
                  </div>
               </form>
            </div>
         </div>
      </div>

      <div class="col-xl-9 col-lg-8">
         <div class="card">
            <div class="card-header d-flex justify-content-between">
               <div class="header-title">
                  <h4 class="card-title">New User Information</h4>
               </div>
            </div>
            <div class="card-body">
               <div class="new-user-info">
                  <form method="POST" action="{{ route('user.store') }}">
                        @csrf
                     <div class="row">
                        <div class="form-group col-md-6">
                           <label class="form-label" for="uname">Name:</label>
                           <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" required autocomplete="name" value="{{ $user->name }}" autofocus placeholder="User Name">
                           @error('name')
                              <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                              </span>
                           @enderror
                           </div>
                        <div class="form-group col-md-6">
                           <label class="form-label" for="email">Email:</label>
                           <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" required autocomplete="email" value="{{ $user->email }}" id="email" placeholder="Email">
                           @error('email')
                              <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                              </span>
                           @enderror
                           </div>
                        <div class="form-group col-md-6">
                           <label class="form-label" for="pass">Password:</label>
                           <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" id="pass" placeholder="Password">
                           @error('password')
                              <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                              </span>
                           @enderror
                           </div>
                        <div class="form-group col-md-6">
                           <label class="form-label" for="rpass">Repeat Password:</label>
                           <input type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" id="rpass" placeholder="Repeat Password ">
                           </div>
                     </div>
                     <button type="submit" class="btn btn-primary">Add New User</button>
                  </form>
               </div>
            </div>
         </div>
      </div>

   </div>

@endsection
