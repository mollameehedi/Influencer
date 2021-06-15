@extends('layouts.dashboard_app')
@section('title')
    Benifit | Dashboard
@endsection
@section('benifit')
    active
@endsection
@section('dashboard_content')
    <!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ route('home') }}">Home</a>
        <a class="breadcrumb-item active">Benifit</a>
    </nav>
    
    <div class="sl-pagebody">
        <div class="sl-page-title">
            <h5>Benifit</h5>
        </div><!-- sl-page-title -->
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    @if (session('delete_benifit'))
                    <div class="alert alert-success">{{ session('delete_benifit') }}</div>
                    @endif
                    <table class="table table-bordered">
                        <thead class="thead-bordered">
                            <tr>
                                <th>No</th>
                                <th>Benifit Icon</th>
                                <th>Benifit details</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($benifits as $benifit)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>
                                    {{ $benifit->details }}
                                </td>
                                <td>
                                    <img style="width: 100px;" src="{{ asset('uploads/benifit_icon') }}/{{ $benifit->icon }}" alt="">
                                </td>
                                <td>
                                    <a href="{{ route('benifit.show', $benifit->id) }}" class="btn btn-info">Update</a>
                                    <form action="{{ route('benifit.destroy', $benifit->id) }}" method="post">
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
                    @if (session('add_benifit'))
                    <div class="alert alert-success">{{ session('add_benifit') }}</div>
                    @endif
                    
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-header">Add Benifit</div>
                        <div class="card-body">
                            <form action="{{ route('benifit.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Benifit Details</label>
                                    <textarea name="details" rows="4" placeholder="Enter benifit details" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Benifit Icon</label>
                                    <input type="file" class="form-control" name="icon">
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