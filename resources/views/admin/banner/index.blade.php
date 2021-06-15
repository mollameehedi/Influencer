@extends('layouts.dashboard_app')
@section('title')
    Banner | Dashboard
@endsection
@section('banner')
    active
@endsection
@section('dashboard_content')
    <!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ route('home') }}">Home</a>
        <a class="breadcrumb-item active">Banner</a>
    </nav>

    <div class="sl-pagebody">
        <div class="sl-page-title">
            <h5>Banner</h5>
        </div><!-- sl-page-title -->
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    @if (session('delete_banner'))
                    <div class="alert alert-success">{{ session('delete_banner') }}</div>
                    @endif
                    <table class="table table-bordered">
                        <thead class="thead-bordered">
                            <tr>
                                <th>No</th>
                                <th>Banner Background</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($banners as $banner)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>
                                    <img style="width: 100px;" src="{{ asset('uploads/banner_bg') }}/{{ $banner->bg }}" alt="">
                                </td>
                                <td>
                                    <a href="{{ route('banner.show', $banner->id) }}" class="btn btn-info">Update</a>
                                    <form action="{{ route('banner.destroy', $banner->id) }}" method="post">
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
                    @if (session('add_banner'))
                    <div class="alert alert-success">{{ session('add_banner') }}</div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-header">Add Banner</div>
                        <div class="card-body">
                            <form action="{{ route('banner.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                {{-- <div class="form-group">
                                    <label>Heading One</label>
                                    <input type="text" class="form-control" name="heading_one" placeholder="Enter Heading One">
                                </div>
                                <div class="form-group">
                                    <label>Heading Two</label>
                                    <input type="text" class="form-control" name="heading_two" placeholder="Enter Heading Two">
                                </div> --}}
                                <div class="form-group">
                                    <label>Banner BG</label>
                                    <input type="file" class="form-control" name="bg">
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
