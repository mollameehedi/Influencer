@extends('layouts.dashboard_app')
@section('title')
    Update | Benifit | Dashboard
@endsection
@section('benifit')
    active
@endsection
@section('dashboard_content')
    <!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ route('home') }}">Home</a>
        <a class="breadcrumb-item" href="{{ route('benifit.index') }}">Benifit</a>
        <a class="breadcrumb-item active">Update Benifit</a>
    </nav>
    
    <div class="sl-pagebody">
        <div class="sl-page-title">
            <h5>Update Benifit</h5>
        </div><!-- sl-page-title -->
        <div class="container">
            <div class="row">
                <div class="col-lg-6 m-auto">
                    @if (session('update_benifit'))
                    <div class="alert alert-success">{{ session('update_benifit') }}</div>
                    @endif
                    
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-header">Update Benifit</div>
                        <div class="card-body">
                            <form action="{{ route('benifit.update', $info->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <div class="form-group">
                                    <label>Benifit Details</label>
                                    <textarea name="details" rows="4" class="form-control">{{ $info->details }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Benifit Icon</label>
                                    <input type="file" class="form-control" name="icon">
                                </div>
                                    <img style="width: 100px;" src="{{ asset('uploads/benifit_icon') }}/{{ $info->icon }}" alt="">
                                    <br>
                                    <br>
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