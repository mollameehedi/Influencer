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
                        <table class="table table-bordered">
                            <thead class="thead-bordered">
                                <tr>
                                    <th>No</th>
                                    <th>Acount Status</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Created At</th>
                                    <th>Photo</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($users as $user)
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
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
                                        {{-- <img style="width: 50px;" src="data:image/jpeg;base64,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" alt=""> --}}
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
                                </tr>
                                @empty

                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
      </div><!-- sl-pagebody -->
    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

    @endsection
