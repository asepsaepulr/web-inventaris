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
                            <li class="breadcrumb-item active" aria-current="page">Create New Room</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

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
            <div class="card-body px-0">
                <div class="table-responsive">
                  <form method="post" action="{{ route('room_create_form') }}">
                    @csrf

                    <div class="input-group mb-3">
                    <label class="form-label" for="uname">Room Name :</label>
                      <select name="name" class="form-control">
                                  <option value=""> -select room- </option>
                                  <option value="A101"> Room A101 </option>
                                  <option value="A102"> Room A102</option>
                                  <option value="A103"> Room A103 </option>
                                  <option value="A104"> Room A104 </option>
                                  <option value="A105"> Room A105 </option>
                                  <option value="A106"> Room A106 </option>
                                  <option value="A107"> Room A107 </option>
                                  <option value="A108"> Room A108 </option>

                                  <option value="B101"> Room B101 </option>
                                  <option value="B102"> Room B102</option>
                                  <option value="B103"> Room B103 </option>
                                  <option value="B104"> Room B104 </option>
                                  <option value="B105"> Room B105 </option>
                                  <option value="B106"> Room B106 </option>
                                  <option value="B107"> Room B107 </option>
                                  <option value="B108"> Room B108 </option>

                                  <option value="C101"> Room C101 </option>
                                  <option value="C102"> Room C102</option>
                                  <option value="C103"> Room C103 </option>
                                  <option value="C104"> Room C104 </option>
                                  <option value="C105"> Room C105 </option>
                                  <option value="C106"> Room C106 </option>
                                  <option value="C107"> Room C107 </option>
                                  <option value="C108"> Room C108 </option>
                              </select>
                    </div>

                    <div class="input-group mb-3">
                      <label class="form-label" for="uname">Building Name :</label>
                        <select name="building_name" class="form-control">
                                  <option value=""> -select building- </option>
                                  <option value="A"> Building A </option>
                                  <option value="B"> Building B </option>
                                  <option value="C"> Building C </option>
                                  <option value="D"> Building D </option>
                                  <option value="E"> Building E </option>
                                  <option value="F"> Building F </option>
                                  <option value="G"> Building G </option>
                                  <option value="H"> Building H </option>
                              </select>
                    </div>
                    <div class="input-group mb-3">
                      <label class="form-label" for="uname">Floor :</label>
                        <select name="floor" class="form-control">
                                  <option value=""> -select floor- </option>
                                  <option value="1"> Floor 1 </option>
                                  <option value="2"> Floor 2 </option>
                                  <option value="3"> Floor 3 </option>
                                  <option value="4"> Floor 4 </option>
                                  <option value="5"> Floor 5 </option>
                                  <option value="6"> Floor 6 </option>
                                  <option value="7"> Floor 7 </option>
                              </select>
                    </div>

                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
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
                    Insert New Data
                </button>
            </form>
        </div>
    </div>
</div>

@endsection
