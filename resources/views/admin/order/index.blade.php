@extends('layouts.dashboard_app')
@section('title')
    Home | Orders
@endsection
@section('orders')
    active
@endsection
@section('dashboard_content')
<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
  <nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item active" href="{{ url('/home') }}">Home</a>
  </nav>

  <div class="sl-pagebody">
    <div class="sl-page-title">
      <h1>All Orders</h1>
    </div><!-- sl-page-title -->
        <div class="container">
            <div class="row">
                <div class="col-lg-4 pt-5 pb-5"><h4><strong>Total Success : {{ complete_order() }}</strong></h4></div>
                <div class="col-lg-4 pt-5 pb-5"><h4><strong>Active : {{ active_order() }}</strong></h4></div>
                <div class="col-lg-4 pt-5 pb-5"><h4><strong>Request : {{ new_order() }}</strong></h4></div>
                <div class="col-lg-12">

                    @if (session('delete_status'))
                    <div class="alert alert-danger">{{ session('delete_status') }}</div>
                    @endif
                    @if (session('accept_status'))
                    <div class="alert alert-success">{{ session('accept_status') }}</div>
                    @endif
                    @if (session('complete_status'))
                    <div class="alert alert-success">{{ session('complete_status') }}</div>
                    @endif
                    <table class="table table-bordered">
                        <thead class="thead-bordered">
                            <tr>
                                <th>No</th>
                                <th>User Name</th>
                                <th>Offer name</th>
                                <th>Photo</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($orders as $order)
                            <tr class="{{ ($order->offer_activity == 1) ? 'bg-info text-white':'' }}">
                                <td class="{{ ($order->offer_activity == 1) ? 'bg-info text-white':'' }}">{{ $loop->index+1 }}</td>
                                {{-- <td>
                                    @if ($order->email_verified_at === null)
                                     <span class="badge badge-warning"> Unverified</span>
                                    @else
                                        <span class="badge badge-success">verified</span>
                                    @endif
                                </td> --}}
                                <td class="{{ ($order->offer_activity == 1) ? 'bg-info text-white':'' }}">
                                    {{ single_user($order->user_id) }}
                                </td>
                                <td class="{{ ($order->offer_activity == 1) ? 'bg-info text-white':'' }}">
                                    {{ $order->offer->name }}
                                </td>
                                <td>
                                   <img style="width: 50px;" src="{{ asset('uploads/shop_photo') }}/{{ $order->offer->thumbnail }}" alt="">
                                </td class="{{ ($order->offer_activity == 1) ? 'bg-info text-white':'' }}">
                                <td class="{{ ($order->offer_activity == 1) ? 'bg-info text-white':'' }}">
                                    {{ $order->created_at }}
                                </td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        {{-- @if ($order->email_verified_at === null)
                                        <a href="{{ route('order.verified',$order->id) }}" class="btn btn-warning">verified</a>
                                        @endif --}}
                                        @if ($order->offer_activity == 1)
                                        <a href="{{ route('home.order.accept',$order->id) }}" class="btn btn-primary">Accept</a>
                                        <a href="{{ route('home.order.delete',$order->id) }}" class="btn btn-danger">Delete</a>
                                        @endif
                                        @if ($order->offer_activity == 2)
                                        <a href="{{ route('home.order.complete',$order->id) }}" class="btn btn-primary">Complete</a>
                                        <a href="{{ route('home.order.delete',$order->id) }}" class="btn btn-danger">Delete</a>
                                        @endif
                                        @if ($order->offer_activity == 3)
                                        <span class="text-success">Order Complete  <i class="fa fa-check"></i></span>
                                        @endif
                                      </div>
                                </td>
                            </tr>
                            @empty

                            @endforelse

                        </tbody>
                    </table>
                    {{ $orders->links() }}
                </div>
            </div>
        </div>
  </div><!-- sl-pagebody -->
</div><!-- sl-mainpanel -->
<!-- ########## END: MAIN PANEL ########## -->

@endsection
