@extends('partials.stores.app')
@section('title','Store Home')
@section('store-content')
@push('style')
<!-- Data Table CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css"> -->
@endpush
<div class="main-panel">
  <div class="content-wrapper">

    @if(Session::get('success'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
      <strong>{{session::get('success')}}</strong>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>

    @elseif (Session::get('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>{{session::get('error')}}</strong>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>

    @elseif (Session::get('danger'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>{{session::get('danger')}}</strong>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>

    @endif

    <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Show Product</h4>
            <!-- <a href="javascript:void(0)" onclick="history.back()" class=" btn btn-warning float-lg-right mb-2"><i class="fa fa-plus"></i> &nbsp;Add</a> -->
            <a href="{{route('store.addProductView')}}" class=" btn btn-warning float-lg-right mb-2"><i class="fa fa-plus"></i> &nbsp;Add</a>

            <!-- <p class="card-description">
                    Basic form layout
                  </p> -->
            <table id="products" class="table table-striped table-bordered" style="width:100%">
              <thead>
                <tr>
                  <th>S.No.</th>
                  <th>Image</th>
                  <th>Product Name</th>
                  <th>Price</th>
                  <th>Quantity</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @php
                $i = 1;
                @endphp
                @forelse ($products as $product )
                <tr>
                  <td scope="row">{{$i++}}</td>
                  <td><img src="{{asset('product_images')}}/{{$product->product_img}}" width="150px" height="110px" alt=""></td>
                  <td>{{$product->product_name}}</td>
                  <td>{{$product->product_price}}</td>
                  <td>{{$product->product_qty}}</td>
                  <td>
                    @if ($product->status==1)
                    <span class="badge badge-success">Active</span>
                    @elseif ($product->status==0)
                    <span class="badge badge-info">Dective</span>
                    @endif
                  </td>

                  <td>
                    <a href="{{url('store/edit-product')}}/{{$product->id}}" class="btn btn-primary">Edit</a>
                    <a href="{{url('store/delete-product')}}/{{$product->id}}" class="btn btn-danger button delete-Productconfirm">Delete</a>
                  </td>

                </tr>
                @empty
                <h4>Data not Found</h4>
                @endforelse
              </tbody>
            </table>

          </div>
        </div>
      </div>

    </div>
  </div>
  <!-- content-wrapper ends -->
  <!-- partial:../../partials/_footer.html -->
  <footer class="footer">
    <div class="d-sm-flex justify-content-center justify-content-sm-between">
      <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021. Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash. All rights reserved.</span>
      <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="ti-heart text-danger ml-1"></i></span>
    </div>
  </footer>
  <!-- partial -->
</div>


@endsection
@push('script')
<!-- Data Table Script -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    
$('.delete-Productconfirm').on('click', function (event) {
    event.preventDefault();
    const url = $(this).attr('href');
    swal({
        title: 'Are you sure?',
        text: 'This record will be permanantly deleted!',
        icon: 'warning',
        buttons: ["Cancel", "Yes!"],
    }).then(function(value) {
        if (value) {
            window.location.href = url;
        }
    });
});
</script>

<script>
  $(document).ready(function() {
    $('#products').DataTable();
  });
</script>
@endpush