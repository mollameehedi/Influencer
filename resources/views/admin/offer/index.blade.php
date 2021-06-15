@extends('layouts.dashboard_app')
@section('title')
    Offer | Dashboard
@endsection
@section('offer')
    active
@endsection
@section('dashboard_content')
    <!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ route('home') }}">Home</a>
        <a class="breadcrumb-item active">Offer</a>
    </nav>
    
    <div class="sl-pagebody">
        <div class="sl-page-title">
            <h5>Offer</h5>
        </div><!-- sl-page-title -->
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    @if (session('delete_offer'))
                    <div class="alert alert-success">{{ session('delete_offer') }}</div>
                    @endif
                    <table class="table table-bordered">
                        <thead class="thead-bordered">
                            <tr>
                                <th>No</th>
                                <th>Offer heading</th>
                                <th>Offer detail</th>
                                <th>Offer BG</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($offers as $offer)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>
                                    {{ $offer->heading }}
                                </td>
                                <td>
                                    {{ $offer->detail }}
                                </td>
                                <td>
                                    <img style="width: 100px;" src="{{ asset('uploads/offer_bg') }}/{{ $offer->bg }}" alt="">
                                </td>
                                <td>
                                    <a href="{{ route('offer.show', $offer->id) }}" class="btn btn-info">Update</a>
                                    <form action="{{ route('offer.destroy', $offer->id) }}" method="post">
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
                    @if (session('add_offer'))
                    <div class="alert alert-success">{{ session('add_offer') }}</div>
                    @endif
                    
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-header">Add Offer</div>
                        <div class="card-body">
                            <form action="{{ route('offer.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Offer heading</label>
                                    <input class="form-control" type="text" name="heading" placeholder="Enter offer heading">
                                </div>
                                <div class="form-group">
                                    <label>Offer Detail</label>
                                    <textarea name="detail" rows="4" placeholder="Enter offer detail" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Offer BG</label>
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