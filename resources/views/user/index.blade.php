@extends('layouts.app') 

@section('content') 

@if ($message = Session::get('succes')) 

  <div class="row">
    <div class="col-lg-12">
      <div class="bd-example">
        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
          <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
              <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
          </symbol>
        </svg>
        <div class="alert alert-solid alert-success rounded-0 alert-dismissible fade show " role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24">
                <use xlink:href="#check-circle-fill" />
            </svg>
            <span>{{ $message }}</span>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      </div>
    </div>
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
                <h5 class="fw-bold"> Users Management </h5>
              </li>
              <li class="breadcrumb-item active" aria-current="page">Home Page Users</li>
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
        <div class="float-right">
          <a href="{{ route('user.create') }}">
            <button class="btn btn-primary">
              <span class="btn-inner">
                <svg width="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M7.33 2H16.66C20.06 2 22 3.92 22 7.33V16.67C22 20.06 20.07 22 16.67 22H7.33C3.92 22 2 20.06 2 16.67V7.33C2 3.92 3.92 2 7.33 2ZM12.82 12.83H15.66C16.12 12.82 16.49 12.45 16.49 11.99C16.49 11.53 16.12 11.16 15.66 11.16H12.82V8.34C12.82 7.88 12.45 7.51 11.99 7.51C11.53 7.51 11.16 7.88 11.16 8.34V11.16H8.33C8.11 11.16 7.9 11.25 7.74 11.4C7.59 11.56 7.5 11.769 7.5 11.99C7.5 12.45 7.87 12.82 8.33 12.83H11.16V15.66C11.16 16.12 11.53 16.49 11.99 16.49C12.45 16.49 12.82 16.12 12.82 15.66V12.83Z" fill="currentColor"></path>
                </svg>
              </span> Add User </button>
          </a>
        </div>
        <div class="table-responsive">
          <table id="user-list-table" class="table table-striped" role="grid">
            <thead>
              <tr class="ligth">
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Created At</th>
                <th style="min-width: 100px">Action</th>
              </tr>
            </thead>
            <tbody> @foreach ($user as $data) <tr>
                <th scope="row">{{ ++$i }}</th>
                <td>{{ $data->name}}</td>
                <td>{{ $data->email}}</td>
                <td> @foreach ($data->roles as $role) {{ $role->name }} @endforeach </td>
                <td>{{ $data->created_at->format('d M Y')}}</td>
                <td>
                  <form action="{{ route('user.destroy',$data->id) }}" method="POST">
                    <div class="flex align-items-center list-user-action">
                      <a class="btn btn-sm btn-icon" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="{{ route('user.edit',$data->id) }}">
                        <span class="btn-inner">
                          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M15.5058 6.62458L17.3747 8.49254L15.5058 6.62458ZM16.7076 4.97897L11.6543 10.0323C11.3932 10.293 11.2151 10.6252 11.1426 10.987L10.6758 13.3235L13.0123 12.8558C13.374 12.7835 13.7058 12.6061 13.967 12.3449L19.0203 7.29164C19.1721 7.13979 19.2926 6.95951 19.3748 6.76111C19.457 6.56271 19.4992 6.35006 19.4992 6.13531C19.4992 5.92055 19.457 5.70791 19.3748 5.5095C19.2926 5.3111 19.1721 5.13082 19.0203 4.97897C18.8684 4.82712 18.6882 4.70666 18.4897 4.62448C18.2913 4.5423 18.0787 4.5 17.8639 4.5C17.6492 4.5 17.4365 4.5423 17.2381 4.62448C17.0397 4.70666 16.8595 4.82712 16.7076 4.97897V4.97897Z" stroke="#AEAEB2" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M17.7354 15.0892V17.7363C17.7354 18.2044 17.5495 18.6532 17.2186 18.9842C16.8876 19.3151 16.4387 19.5011 15.9707 19.5011H6.26472C5.79669 19.5011 5.34783 19.3151 5.01688 18.9842C4.68593 18.6532 4.5 18.2044 4.5 17.7363V8.03035C4.5 7.56232 4.68593 7.11345 5.01688 6.7825C5.34783 6.45155 5.79669 6.26563 6.26472 6.26562H8.91181" stroke="#AEAEB2" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                          </svg>
                        </span>
                      </a> @csrf @method('DELETE') <button type="submit" class="btn btn-sm btn-icon" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="#">
                        <span class="btn-inner">
                          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10.472 16.6389C10.2738 16.6389 10.0837 16.5612 9.94351 16.4227C9.80335 16.2842 9.72461 16.0965 9.72461 15.9006V10.7917C9.72461 10.5952 9.80362 10.4067 9.94427 10.2678C10.0849 10.1288 10.2757 10.0508 10.4746 10.0508C10.6735 10.0508 10.8643 10.1288 11.0049 10.2678C11.1456 10.4067 11.2246 10.5952 11.2246 10.7917V15.8977C11.225 15.9953 11.2058 16.0921 11.1681 16.1823C11.1303 16.2726 11.0749 16.3546 11.0049 16.4235C10.9349 16.4924 10.8518 16.547 10.7603 16.584C10.6688 16.6209 10.5708 16.6396 10.472 16.6389Z" fill="#AEAEB2"/>
                            <path d="M13.472 16.6389C13.2738 16.6389 13.0837 16.5612 12.9435 16.4227C12.8033 16.2842 12.7246 16.0965 12.7246 15.9006V10.7917C12.7246 10.5952 12.8036 10.4067 12.9443 10.2678C13.0849 10.1288 13.2757 10.0508 13.4746 10.0508C13.6735 10.0508 13.8643 10.1288 14.0049 10.2678C14.1456 10.4067 14.2246 10.5952 14.2246 10.7917V15.8977C14.225 15.9953 14.2058 16.0921 14.1681 16.1823C14.1303 16.2726 14.0749 16.3546 14.0049 16.4235C13.9349 16.4924 13.8518 16.547 13.7603 16.584C13.6688 16.6209 13.5708 16.6396 13.472 16.6389Z" fill="#AEAEB2"/>
                            <path d="M19.0462 6.32511H14.8557V4.86329C14.8557 4.66749 14.777 4.4797 14.6368 4.34124C14.4967 4.20278 14.3066 4.125 14.1084 4.125H9.88649C9.68827 4.125 9.49818 4.20278 9.35802 4.34124C9.21786 4.4797 9.13912 4.66749 9.13912 4.86329V6.32511H4.89707C4.68911 6.33139 4.4918 6.41741 4.34695 6.56494C4.2021 6.71248 4.12109 6.90993 4.12109 7.11545C4.12109 7.32098 4.2021 7.51843 4.34695 7.66596C4.4918 7.8135 4.68911 7.89952 4.89707 7.9058H6.21991L6.8178 17.3774C6.86197 18.0531 7.16445 18.6871 7.664 19.1508C8.16354 19.6145 8.82282 19.8734 9.50832 19.875H14.4312C15.1167 19.8734 15.776 19.6145 16.2755 19.1508C16.7751 18.6871 17.0776 18.0531 17.1217 17.3774L17.7196 7.9058H19.0462C19.1533 7.90903 19.26 7.89098 19.3599 7.85272C19.4599 7.81446 19.551 7.75676 19.6279 7.68305C19.7049 7.60934 19.766 7.52112 19.8078 7.42362C19.8496 7.32612 19.8711 7.22133 19.8711 7.11545C19.8711 7.00958 19.8496 6.90479 19.8078 6.80729C19.766 6.70979 19.7049 6.62157 19.6279 6.54786C19.551 6.47415 19.4599 6.41645 19.3599 6.37819C19.26 6.33993 19.1533 6.32188 19.0462 6.32511ZM10.6353 5.60675H13.3558V6.23947H10.6353V5.60675ZM15.4588 17.2755C15.4418 17.5329 15.3264 17.7742 15.1361 17.9508C14.9457 18.1273 14.6946 18.2258 14.4335 18.2264H9.51056C9.24934 18.2258 8.9981 18.1272 8.80772 17.9505C8.61734 17.7738 8.50204 17.5322 8.48517 17.2747L7.89625 7.97224H16.0478L15.4588 17.2755Z" fill="#AEAEB2"/>
                          </svg>
                        </span>
                      </button>
                    </div>
                  </form>
                </td>
              </tr> @endforeach </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
