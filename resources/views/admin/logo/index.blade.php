@extends('layouts.dashboard_app')
@section('title')
    Logo | Dashboard
@endsection
@section('logo')
    active
@endsection
@section('dashboard_content')
    <!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ route('home') }}">Home</a>
        <a class="breadcrumb-item active">Logo</a>
    </nav>
    
    <div class="sl-pagebody">
        <div class="sl-page-title">
            <h5>Logo</h5>
        </div><!-- sl-page-title -->
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <table class="table table-bordered">
                        <thead class="thead-bordered">
                            <tr>
                                <th>Logo</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <img style="width: 100px;" src="{{ asset('uploads/logo') }}/{{ $logo->logo }}" alt="">
                                </td>
                                <td>
                                    <a href="{{ route('updatelogo', $logo->id) }}" class="btn btn-info">Update</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-lg-4"></div>
                <div class="col-lg-4">
                    @if (session('logo_update'))
                    <div class="alert alert-success">{{ session('logo_update') }}</div>
                    @endif
                    @if (session('no_file'))
                    <div class="alert alert-danger">{{ session('no_file') }}</div>
                    @endif
                    <div class="card">
                        <div class="card-header">Update Logo</div>
                        <div class="card-body">
                            <form action="{{ route('updatelogo', $logo->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Logo</label>
                                    <input type="file" class="form-control" name="logo">
                                </div>
                                <img style="width:50px;" src="{{ asset('uploads/logo') }}/{{ $logo->logo }}" alt="">
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