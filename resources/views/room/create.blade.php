@extends('layouts.app')

@section('content')

<div>
  <h1> Insert New Room Data </h1>

  <form method="post" action="{{ route('room_create_form') }}">
  @csrf

  <div class="input-group mb-3">
    name :
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
      building_name :
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
      floor :
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


  <button> Insert New Data </button>

  </form>
</div>

@endsection
