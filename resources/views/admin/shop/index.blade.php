@extends('layouts.dashboard_app')
@section('title')
    Shop | Dashboard
@endsection
@section('shop')
    active
@endsection
@section('dashboard_content')
    <!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ route('home') }}">Home</a>
        <a class="breadcrumb-item active">Shop</a>
    </nav>

    <div class="sl-pagebody">
        <div class="sl-page-title">
            <h5>Shop</h5>
        </div><!-- sl-page-title -->
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    @if (session('delete_shop'))
                    <div class="alert alert-success">{{ session('delete_shop') }}</div>
                    @endif
                    <table class="table table-bordered">
                        <thead class="thead-bordered">
                            <tr>
                                <th>No</th>
                                <th>Category</th>
                                <th>Name</th>
                                <th>Schedule</th>
                                <th>Availability</th>
                                <th>Thumbnail</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($shops as $shop)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>
                                    @if ($shop->type === 1)
                                        Delivery
                                    @elseif ($shop->type === 2)
                                        Experience
                                    @else
                                        Dinner Out
                                    @endif
                                </td>
                                <td>
                                    {{ $shop->name }}
                                </td>
                                <td>
                                    {{ $shop->time_sidule }}
                                </td>
                                <td>
                                    {{ $shop->soldout_or_not }}
                                </td>
                                <td>
                                    <img style="width: 50px;" src="{{ asset('uploads/shop_photo') }}/{{ $shop->thumbnail }}" alt="">
                                </td>
                                <td>
                                    <a href="{{ route('shops.show', $shop->id) }}" class="btn btn-info">Update</a>
                                    <form action="{{ route('shops.destroy', $shop->id) }}" method="post">
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
                    @if (session('add_shop'))
                    <div class="alert alert-success">{{ session('add_shop') }}</div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-header">Add Shop</div>
                        <div class="card-body">
                            <form action="{{ route('shops.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                            <div class="form-group">
                                <label for="my_select">Select Category</label>
                                <select id="my_select" class="form-control me" name="type">
                                    <option>--Select--</option>
                                    <option value="1">Delivery</option>
                                    <option value="2">Experience</option>
                                    <option value="3">Dinner Out</option>
                                </select>
                            </div>
                                <div class="form-group">
                                    <label>Shop name</label>
                                    <input type="text" class="form-control" name="name" placeholder="Enter shop name">
                                </div>
                                <div class="form-group">
                                    <label>Shop Schedule</label>
                                    <input type="text" class="form-control" name="time_sidule" placeholder="Enter time schedule (optional)">
                                </div>
                                <div class="form-group">
                                    <label>Shop description</label>
                                    <textarea name="details" id="editor1" rows="4" placeholder="Enter shop description" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Shop rules</label>
                                    <textarea name="rules" rows="4" id="editor2" placeholder="Enter shop rules" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Shop availability</label>
                                    <input type="text" class="form-control" name="soldout_or_not" placeholder="Enter availability (optional)">
                                </div>
                                <div class="form-group">
                                    <label>Shop thumbnail</label>
                                    <input type="file" class="form-control" name="thumbnail" placeholder="Enter shop thumbnail">
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
 @section('footer_scripts')
<script type="text/javascript">


  $(document).ready(function(){
//     $('#my_select').change(function(){


// };
$('.me').change(function(){
    let frist_op = document.querySelector('.me').value;
    alert(this.value);
    if (frist_op == 1) {
        alert('this is one')
    }
    else if(this.value == 2){
        alert('this is two')
    }
    else {
        alert('this is three');
    }
})
    ClassicEditor
                                .create( document.querySelector( '#editor1' ) )
                                .then( editor => {
                                        console.log( editor );
                                } )
                                .catch( error => {
                                        console.error( error );
                                } );
  })

</script>
<script type="text/javascript">
  $(document).ready(function(){
    ClassicEditor
                                .create( document.querySelector( '#editor2' ) )
                                .then( editor => {
                                        console.log( editor );
                                } )
                                .catch( error => {
                                        console.error( error );
                                } );


  })
</script>

@endsection
