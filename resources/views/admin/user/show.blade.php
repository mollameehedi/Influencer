@extends('layouts.dashboard_app')
@section('title')
    Home | Dashboard
@endsection
@section('dashboard')
    active
@endsection
@section('dashboard_content')
<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
  <nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item active" href="{{ url('/home') }}">Home</a>
  </nav>

  <div class="sl-pagebody">
    <div class="sl-page-title">
      <h1>Admin Dashboard</h1>
    </div><!-- sl-page-title -->
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    @if (session('delete_status'))
                    <div class="alert alert-danger">{{ session('delete_status') }}</div>
                    @endif
                    @if (session('varified_status'))
                    <div class="alert alert-success">{{ session('varified_status') }}</div>
                    @endif
                    <table class="table table-bordered">
                        <thead class="thead-bordered">
                            <tr>
                                <th><strong>Details of {{ $user->name }}</strong></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>ID : </strong>{{ $user->id }} </td>
                            </tr>
                            <tr>
                                <td><strong>Name : </strong>{{ $user->name }} </td>
                            </tr>
                            <tr>
                                <td><strong>Gender : </strong>{{ $user->gender }} </td>
                            </tr>
                            <tr>
                                <td><strong>Email : </strong>{{ $user->email }} </td>
                            </tr>
                            <tr>
                                <td><strong>What'a app  : </strong>{{ $user->whatsapp_number }} </td>
                            </tr>
                            <tr>
                                <td><strong>Instagram  ID: </strong>{{ $user->instagram }} </td>
                            </tr>
                            <tr>
                                <td><strong>Nationality : </strong>{{ $user->nationality }} </td>
                            </tr>
                            <tr>
                                <td><strong>State : </strong>{{ $user->state }} </td>
                            </tr>
                            <tr>
                                <td><strong>Date of Birth : </strong>{{ $user->birth }} </td>
                            </tr>
                            <tr>
                                <td><strong>Created at : </strong>{{ $user->created_at }} </td>
                            </tr>
                            <tr>
                                <td><strong>Email Verified At : </strong>
                                    @if ($user->email_verified_at === null)
                                    <span class="badge badge-warning"> Unverified</span>
                                   @else
                                       <span class="badge badge-success">{{ $user->email_verified_at }} </span>
                                   @endif

                                </td>
                            </tr>
                            {{-- <tr>
                                <td>
                                    @if ($user->email_verified_at === null)
                                     <span class="badge badge-warning"> Unverified</span>
                                    @else
                                        <span class="badge badge-success">verified</span>
                                    @endif
                                </td>
                                <td>
                                    {{ $user->name }}
                                </td>
                                <td>
                                    {{ $user->email }}
                                </td>
                                <td>
                                    {{ $user->created_at }}
                                </td>
                                <td>
                                    <img style="width: 50px;" src="{{ asset('uploads/profile_photos') }}/{{ $user->profile_photo }}" alt="">
                                </td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        @if ($user->email_verified_at === null)
                                        <a href="{{ route('user.verified',$user->id) }}" class="btn btn-warning">verified</a>
                                        @endif
                                        <a href="{{ route('user.show',$user->id) }}" class="btn btn-primary">Show</a>
                                        <a href="{{ route('user.delete',$user->id) }}" class="btn btn-danger">Delete</a>
                                      </div>
                                </td>
                            </tr> --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
  </div><!-- sl-pagebody -->
</div><!-- sl-mainpanel -->
<!-- ########## END: MAIN PANEL ########## -->

@endsection
