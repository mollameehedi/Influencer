@extends('layouts.dashboard_app')
@section('title')
    Update | Partner | Dashboard
@endsection
@section('partner')
    active
@endsection
@section('dashboard_content')
    <!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ route('home') }}">Home</a>
        <a class="breadcrumb-item" href="{{ route('logo.index') }}">Partner</a>
        <a class="breadcrumb-item active">Update Partner</a>
    </nav>
    
    <div class="sl-pagebody">
        <div class="sl-page-title">
            <h5>Update Partner</h5>
        </div><!-- sl-page-title -->
        <div class="container">
            <div class="row">
                <div class="col-lg-4 m-auto">
                    @if (session('update_partner'))
                    <div class="alert alert-success">{{ session('update_partner') }}</div>
                    @endif
                    
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-header">Update Partner</div>
                        <div class="card-body">
                            <form action="{{ route('logo.update', $info->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <div class="form-group">
                                    <label>Partner Logo</label>
                                    <input type="file" class="form-control" name="partner_logo">
                                </div>
                                <img style="width: 50px;" src="{{ asset('uploads/partner_logo') }}/{{ $info->partner_logo }}" alt="">
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