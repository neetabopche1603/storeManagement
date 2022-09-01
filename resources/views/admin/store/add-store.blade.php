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
                        <h4 class="card-title">Add Store</h4>
                        <a href="javascript:void(0)" onclick="history.back()" class="btn btn-primary btn-lg float-lg-right"><i class="fa fa-backward"></i> &nbsp;Back</a>
                    </div>

                    <div class="card-body">
                        <form action="{{route('admin.addStorePost')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="basic-form">
                                <div class="form-group">
                                    <label for=""><b class="text-success">Store Name: <span class="text-danger">*</span></b></label>
                                    <input type="text" name="store_name" class="form-control input-rounded" placeholder="D-mart">
                                    <span class="text-danger">
                                        @error('store_name')
                                            {{$message}}
                                        @enderror
                                    </span>
                                </div>

                                <div class="form-group">
                                    <label for=""><b class="text-success">Phone: <span class="text-danger">*</span></b></label>
                                    <input type="number" name="phone_number" class="form-control input-rounded" placeholder="+91-XXXXXXXXXX">
                                    <span class="text-danger">
                                        @error('phone_number')
                                            {{$message}}
                                        @enderror
                                    </span>
                                </div>

                                <div class="form-group">
                                    <label for=""><b class="text-success">Email: <span class="text-danger">*</span></b></label>
                                    <input type="email" name="store_email" class="form-control input-rounded" placeholder="demo@gmail.com">
                                    <span class="text-danger">
                                        @error('store_email')
                                            {{$message}}
                                        @enderror
                                    </span>
                                </div>

                                <div class="form-group">
                                    <label for=""><b class="text-success">Address: <span class="text-danger">*</span></b></label>
                                    <!-- <input type="text" class="form-control input-rounded" placeholder="D-mart"> -->
                                    <textarea class="form-control" name="store_address" rows="4" id="comment"></textarea>
                                    <span class="text-danger">
                                        @error('store_address')
                                            {{$message}}
                                        @enderror
                                    </span>
                                </div>

                                <div class="form-group">
                                    <label for=""><b class="text-success">Status: <span class="text-danger">*</span></b></label> &nbsp;&nbsp;&nbsp;&nbsp;
                                    <input type="text" class="btn btn-primary" value="Active" disabled>
                                </div>

                            </div>
                            <input type="submit" class="btn btn-primary" value="Save">
                            </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
</div>

@endsection