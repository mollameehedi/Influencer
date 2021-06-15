@extends('layouts.dashboard_app')
@section('title')
    Update | Banner | Dashboard
@endsection
@section('banner')
    active
@endsection
@section('dashboard_content')
    <!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ route('home') }}">Home</a>
        <a class="breadcrumb-item" href="{{ route('banner.index') }}">Banner</a>
        <a class="breadcrumb-item active">Update Banner</a>
    </nav>
    
    <div class="sl-pagebody">
        <div class="sl-page-title">
            <h5>Update Banner</h5>
        </div><!-- sl-page-title -->
        <div class="container">
            <div class="row">
                <div class="col-lg-6 m-auto">
                    @if (session('update_banner'))
                    <div class="alert alert-success">{{ session('update_banner') }}</div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-header">Update Banner</div>
                        <div class="card-body">
                            <form action="{{ route('banner.update', $info->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <div class="form-group">
                                    <label>Heading One</label>
                                    <input type="text" class="form-control" name="heading_one" value="{{ $info->heading_one }}">
                                </div>
                                <div class="form-group">
                                    <label>Heading Two</label>
                                    <input type="text" class="form-control" name="heading_two" value="{{ $info->heading_two }}">
                                </div>
                                <div class="form-group">
                                    <label>Banner BG</label>
                                    <input type="file" class="form-control" name="bg">
                                </div>
                                <img style="width: 50px;" src="{{ asset('uploads/banner_bg') }}/{{ $info->bg }}" alt="">
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