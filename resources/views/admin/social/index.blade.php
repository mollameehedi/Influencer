@extends('layouts.dashboard_app')
@section('title')
    Social media | Dashboard
@endsection
@section('social')
    active
@endsection
@section('dashboard_content')
    <!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ route('home') }}">Home</a>
        <a class="breadcrumb-item active">Social</a>
    </nav>
    
    <div class="sl-pagebody">
        <div class="sl-page-title">
            <h5>Social</h5>
        </div><!-- sl-page-title -->
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    @if (session('delete_social'))
                    <div class="alert alert-success">{{ session('delete_social') }}</div>
                    @endif
                    <table class="table table-bordered">
                        <thead class="thead-bordered">
                            <tr>
                                <th>No</th>
                                <th>Social Link</th>
                                <th>Social icon class</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($socials as $social)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>
                                    {{ $social->social_link }}
                                </td>
                                <td>
                                    
                                    {{ $social->social_icon }}
                                </td>
                                <td>
                                    <a href="{{ route('social.show', $social->id) }}" class="btn btn-info">Update</a>
                                    <form action="{{ route('social.destroy', $social->id) }}" method="post">
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
                    @if (session('add_social'))
                    <div class="alert alert-success">{{ session('add_social') }}</div>
                    @endif
                    
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-header">Add Social</div>
                        <div class="card-body">
                            <form action="{{ route('social.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Social link</label>
                                    <textarea name="social_link" rows="4" placeholder="Enter social link" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Social icon class</label>
                                    <input type="text" class="form-control" name="social_icon" placeholder="Enter social icon class">
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