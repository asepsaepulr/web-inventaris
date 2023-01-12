@extends('layouts.app')

@section('content')

@if ($message = Session::get('error'))
    <div class="alert alert-danger alert-block">
      <button type="button" class="close" data-dismiss="alert">×</button>
      <strong>{{ $message }}</strong>
    </div>
  @elseif ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif

   <div class="row">

      <div class="col-sm-12">

            <div class="card">

               <div class="card-body">

                  <div class="bd-example">

                     <nav aria-label="breadcrumb">

                           <ol class="breadcrumb">

                              <li class="breadcrumb-item">

                                 <h5 class="fw-bold">

                                       Users Management

                                 </h5>

                              </li>

                              <li class="breadcrumb-item" aria-current="page">
                           
                                 <a class="" href="{{ route('user.index') }}"> Home Page Users </a>
                              
                              </li>

                              <li class="breadcrumb-item active" aria-current="page">Create Page Users</li>

                           </ol>

                     </nav>

                  </div>

               </div>

            </div>

      </div>

   </div>

   <div class="row">

      <div class="col-xl-4 col-lg-4">

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
                     <select name="type" class="selectpicker form-control" data-style="py-0">
                        <option>Select</option>
                        <option>Web Designer</option>
                        <option>Web Developer</option>
                        <option>Tester</option>
                        <option>Php Developer</option>
                        <option>Ios Developer </option>
                     </select>
                  </div>
               </form>
            </div>

         </div>

      </div>

      <div class="col-xl-8 col-lg-8">
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
                           <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" required autocomplete="name" autofocus placeholder="User Name">
                           @error('name')
                              <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                              </span>
                           @enderror
                           </div>
                        <div class="form-group col-md-6">
                           <label class="form-label" for="email">Email:</label>
                           <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" id="email" placeholder="Email">
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
