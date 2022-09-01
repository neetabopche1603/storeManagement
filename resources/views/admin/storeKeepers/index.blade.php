@extends('partials.app')
@section('title','Admin Home')
@section('content')

<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Hi, welcome back!</h4>
                    <p class="mb-0">{{auth()->user()->name}}</p>
                    <p class="mb-0"></p>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Store</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">All Store's Keepers</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <!-- Notifications Start-->
                    @if ($msg = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $msg }}</strong>
                    </div>

                    @elseif (Session::get('faild'))
                    <div class="alert alert-danger alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ Session::get('faild') }}</strong>
                    </div>

                    @elseif (Session::get('delete'))
                    <div class="alert alert-danger alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ Session::get('delete') }}</strong>
                    </div>
                    @endif
                    <!-- Notifications End-->

                    <div class="card-header">
                        <h4 class="card-title">Show All Store Keepers</h4>
                        <a href="{{route('admin.addStoreKeep')}}" class="btn btn-primary btn-lg float-lg-right"><i class="fa fa-plus"></i> &nbsp;Add</a>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>S.No.</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Store Name</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $i=1;
                                    @endphp
                                    @forelse ($storeKeeprs as $rows)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td><img src="{{asset('images')}}/{{$rows->image}}" width="100px" height="100px" alt=""></td>
                                        <td>{{$rows->name}}</td>
                                        <td>{{$rows->store_name}}</td>
                                        <td>
                                            @if ($rows->status==1)
                                            <span class="badge badge-success">Active</span>
                                            @elseif ($rows->status ==0)
                                            <span class="badge badge-info">Dective</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{url('admin/view-storeKeeper')}}/{{$rows->id}}" class="btn btn-secondary">View</a>
                                            <a href="{{url('admin/edit-storeKeeper')}}/{{$rows->id}}" class="btn btn-warning">Edit</a>
                                            <a href="{{url('admin/delete-storeKeeper')}}/{{$rows->id}}" class="btn btn-danger button delete-confirmStoreKeepers">Delete</a>
                                        </td>
                                    </tr>
                                    @empty
                                    <h4>Data Not found</h4>
                                    @endforelse

                                </tbody>
                                <!-- <tfoot>
                                            <tr>
                                                <th>Name</th>
                                                <th>Position</th>
                                                <th>Office</th>
                                                <th>Age</th>
                                                <th>Start date</th>
                                                <th>Salary</th>
                                            </tr>
                                        </tfoot> -->
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection


@push('script')

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    
$('.delete-confirmStoreKeepers').on('click', function (event) {
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
    
@endpush