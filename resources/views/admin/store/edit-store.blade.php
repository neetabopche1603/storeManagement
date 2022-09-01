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
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Add Stores</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Store</h4>
                        <a href="javascript:void(0)" onclick="history.back()" class="btn btn-primary btn-lg float-lg-right"><i class="fa fa-backward"></i> &nbsp;Back</a>
                    </div>

                    <div class="card-body">
                        <form action="{{route('admin.storeUpdate')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{$editStoreView->id}}">
                            <div class="basic-form">
                                <div class="form-group">
                                    <label for=""><b class="text-success">Store Name: <span class="text-danger">*</span></b></label>
                                    <input type="text" name="store_name" value="{{$editStoreView->store_name}}" class="form-control input-rounded" placeholder="D-mart">
                                </div>

                                <div class="form-group">
                                    <label for=""><b class="text-success">Phone: <span class="text-danger">*</span></b></label>
                                    <input type="number" name="phone_number" value="{{$editStoreView->phone_number}}" class="form-control input-rounded" placeholder="+91-XXXXXXXXXX">
                                </div>

                                <div class="form-group">
                                    <label for=""><b class="text-success">Email: <span class="text-danger">*</span></b></label>
                                    <input type="email" name="store_email" value="{{$editStoreView->email}}" class="form-control input-rounded" placeholder="demo@gmail.com">
                                </div>

                                <div class="form-group">
                                    <label for=""><b class="text-success">Address: <span class="text-danger">*</span></b></label>
                                    <!-- <input type="text" class="form-control input-rounded" placeholder="D-mart"> -->
                                    <textarea class="form-control" name="store_address" rows="4" id="comment">{{$editStoreView->address}}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for=""><b class="text-success">Status: <span class="text-danger">*</span></b></label> &nbsp;&nbsp;&nbsp;&nbsp;
                                    <div style="font-size: 20px;">
                                        <input type="radio" name="status" id="" value="1" {{ $editStoreView-> status == 1 ? 'checked' : '' }} /> &nbsp;&nbsp;Active &nbsp;&nbsp;&nbsp;&nbsp;
                                        <input type="radio" name="status" id="" value="0" {{ $editStoreView-> status == 0 ? 'checked' : '' }} /> &nbsp;&nbsp;Dective
                                    </div>
                                </div>
                            </div>
                            <input type="submit" class="btn btn-primary mt-2" value="Update">
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
</div>

@endsection