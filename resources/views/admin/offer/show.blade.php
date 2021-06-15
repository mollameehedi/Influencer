@extends('layouts.dashboard_app')
@section('title')
    Update | Offer | Dashboard
@endsection
@section('offer')
    active
@endsection
@section('dashboard_content')
    <!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ route('home') }}">Home</a>
        <a class="breadcrumb-item" href="{{ route('offer.index') }}">Offer</a>
        <a class="breadcrumb-item active">Update offer</a>
    </nav>
    
    <div class="sl-pagebody">
        <div class="sl-page-title">
            <h5>Update Offer</h5>
        </div><!-- sl-page-title -->
        <div class="container">
            <div class="row">
                <div class="col-lg-6 m-auto">
                    @if (session('update_offer'))
                    <div class="alert alert-success">{{ session('update_offer') }}</div>
                    @endif
                    
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-header">Update Offer</div>
                        <div class="card-body">
                            <form action="{{ route('offer.update', $info->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <div class="form-group">
                                    <label>Offer heading</label>
                                    <input class="form-control" type="text" name="heading"  value="{{ $info->heading }}">
                                </div>
                                <div class="form-group">
                                    <label>Offer Detail</label>
                                    <textarea name="detail" rows="4" class="form-control">{{ $info->detail }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Offer BG</label>
                                    <input type="file" class="form-control" name="bg">
                                </div>
                                
                                    <img style="width: 100px;" src="{{ asset('uploads/offer_bg') }}/{{ $info->bg }}" alt="">
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