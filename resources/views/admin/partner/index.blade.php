@extends('layouts.dashboard_app')
@section('title')
    Partner | Dashboard
@endsection
@section('partner')
    active
@endsection
@section('dashboard_content')
    <!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ route('home') }}">Home</a>
        <a class="breadcrumb-item active">Partner</a>
    </nav>
    
    <div class="sl-pagebody">
        <div class="sl-page-title">
            <h5>Partner</h5>
        </div><!-- sl-page-title -->
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    @if (session('delete_logo'))
                    <div class="alert alert-success">{{ session('delete_logo') }}</div>
                    @endif
                    <table class="table table-bordered">
                        <thead class="thead-bordered">
                            <tr>
                                <th>No</th>
                                <th>Partner logo</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($partners as $partner)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>
                                    <img style="width: 100px;" src="{{ asset('uploads/partner_logo') }}/{{ $partner->partner_logo }}" alt="">
                                </td>
                                <td>
                                    <a href="{{ route('logo.show', $partner->id) }}" class="btn btn-info">Update</a>
                                    <form action="{{ route('logo.destroy', $partner->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @empty

                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="col-lg-4">
                    @if (session('add_partner'))
                    <div class="alert alert-success">{{ session('add_partner') }}</div>
                    @endif
                    
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-header">Add Partner</div>
                        <div class="card-body">
                            <form action="{{ route('logo.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Partner Logo</label>
                                    <input type="file" class="form-control" name="partner_logo">
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</div><!-- sl-pagebody -->
</div><!-- sl-mainpanel -->
@endsection