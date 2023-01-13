@extends('layouts.app')

@section('content')
<div class="row">
@foreach ($building as $buildings)
      <div class="col-lg-3 col-md-6">
         <div class="card">
            <div class="card-body">
               <div class="text-center">Room {{ $buildings->name }} </div>
               <div class="d-flex align-items-center justify-content-between mt-3">
                  <div>
                     <!-- <h2 class="counter">{{$buildings->count()}}</h2>
                     rooms -->
                  </div>
                  <div class="border  bg-soft-success rounded p-3">
                     <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                     </svg>
                  </div>
               </div>
               <div class="mt-4">
                  <div class="progress bg-soft-success shadow-none w-100" style="height: 6px">
                     <div class="progress-bar bg-danger" data-toggle="progress-bar" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      @endforeach
   </div>
@endsection
