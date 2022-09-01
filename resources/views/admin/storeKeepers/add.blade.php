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
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Store Keepers</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Add User's</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Add User</h4>
                        <a href="javascript:void(0)" onclick="history.back()" class="btn btn-primary btn-lg float-lg-right"><i class="fa fa-backward"></i> &nbsp;Back</a>
                    </div>

                    <div class="card-body">
                        <form action="{{route('admin.storeKeeperStore')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="basic-form">
                                <div class="form-group">
                                    <label for=""><b class="text-success">Name: <span class="text-danger">*</span></b></label>
                                    <input type="text" name="name" class="form-control input-rounded" placeholder="Enter Name">
                                    <span class="bnt btn-danger">
                                        @error('name')
                                            {{$message}}
                                        @enderror
                                    </span>
                                </div>

                                <div class="form-group">
                                    <label for=""><b class="text-success">Mobile: <span class="text-danger">*</span></b></label>
                                    <input type="number" name="mobile" class="form-control input-rounded" placeholder="+91-XXXXXXXXXX">
                                    <span class="bnt btn-danger">
                                        @error('mobile')
                                            {{$message}}
                                        @enderror
                                    </span>
                                </div>

                                <div class="form-group">
                                    <label for=""><b class="text-success">Email: <span class="text-danger">*</span></b></label>
                                    <input type="email" name="email" class="form-control input-rounded" placeholder="demo@gmail.com">
                                    <span class="bnt btn-danger">
                                        @error('email')
                                            {{$message}}
                                        @enderror
                                    </span>
                                </div>

                                <div class="form-group">
                                    <label for=""><b class="text-success">Password: <span class="text-danger">*</span></b></label>
                                    <input type="password" name="password" class="form-control input-rounded" placeholder="Password">
                                    <span class="bnt btn-danger">
                                        @error('password')
                                            {{$message}}
                                        @enderror
                                    </span>
                                </div>

                                <div class="form-group">
                                    <label for=""><b class="text-success">Re-Type password :<span class="text-danger">*</span></b></label>
                                    <input type="password" name="password_confirmation" class="form-control input-rounded" placeholder="Re-Type Password">
                                    <span class="bnt btn-danger">
                                        @error('password_confirmation')
                                            {{$message}}
                                        @enderror
                                    </span>
                                </div>

                               <div class="form-group">
                               <label for=""><b class="text-success">Store :<span class="text-danger">*</span></b></label>
                                 <select id="single-select" class="form-control" name="manager_store_id">
                                    <option value="AL">--Choose Store--</option>
                                    @foreach ($stores as $store)
                                    <option value="{{$store->id}}">{{$store->store_name}}</option>
                                    @endforeach
                                    
                                </select>
                                <span class="bnt btn-danger">
                                        @error('manager_store_id')
                                            {{$message}}
                                        @enderror
                                    </span>
                               </div>

                                {{--<div class="form-group">
                                    <label for=""><b class="text-success">Image:<span class="text-danger">*</span></b></label>
                                    <input type="file" name="image" class="form-control input-rounded" placeholder="demo@gmail.com">
                                    <span class="bnt btn-danger">
                                        @error('image')
                                            {{$message}}
                                        @enderror
                                    </span>
                                </div>--}}

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