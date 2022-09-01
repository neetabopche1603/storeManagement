@extends('partials.stores.app')
@section('title','Store Home')
@section('store-content')
@push('style')
<!-- Data Table CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css"> -->
@endpush
<div class="main-panel" style="width: 100%;">
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
                        <h4 class="card-title">Show All Sale-Persons</h4>
                        <!-- <a href="javascript:void(0)" onclick="history.back()" class=" btn btn-warning float-lg-right mb-2"><i class="fa fa-plus"></i> &nbsp;Add</a> -->
                        <a href="{{route('store.addSalePersonView')}}" class=" btn btn-warning float-lg-right mb-2"><i class="fa fa-plus"></i> &nbsp;Add</a>

                        <!-- <p class="card-description">
                    Basic form layout
                  </p> -->
                        <table id="salePersons" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>S.No.</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Store Name</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $i = 1;
                                @endphp
                                @forelse ($salePersons as $row)
                                <tr>
                                <td scope="row">{{$i++}}</td>
                                    <td><img src="{{asset('images')}}/{{$row->image}}" width="150px" height="110px" alt=""></td>
                                    <td>{{$row->name}}</td>
                                    <td>{{$row->email}}</td>
                                    <td>{{$row->store_name}}</td>

                                    <td>
                                        @if ($row->status==1)
                                        <span class="badge badge-success">Active</span>
                                        @elseif ($row->status==0)
                                        <span class="badge badge-info">Dective</span>
                                        @endif
                                    </td>

                                    <td>
                                        <a href="{{url('store/edit-saleperson')}}/{{$row->id}}" class="btn btn-primary btn-sm">Edit</a>
                                        <a href="{{url('store/delete-saleperson')}}/{{$row->id}}" class="btn btn-danger btn-sm button delete-confirm-salePerson">Delete</a>
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
    $('.delete-confirm-salePerson').on('click', function(event) {
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
        $('#salePersons').DataTable();
    });
</script>
@endpush