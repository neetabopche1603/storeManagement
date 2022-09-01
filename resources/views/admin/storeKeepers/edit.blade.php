@extends('partials.app')
@section('title','Admin StoreKeeper Edit')
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
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Edit User's</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->


        <div class="row">
            <div class="col-12">
                <div class="card">
                <div class="text-center m-2">
                    <img src="{{asset('images/')}}/{{$editStoreKeepView->image}}" width="100px" height="100px" alt="">
                    </div>
                    <div class="card-header">
                        <h4 class="card-title">Edit User</h4>
                        <a href="javascript:void(0)" onclick="history.back()" class="btn btn-primary btn-lg float-lg-right"><i class="fa fa-backward"></i> &nbsp;Back</a>
                    </div>

                    <div class="card-body">
                        <form action="{{route('admin.updateStoreKeeper')}}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{$editStoreKeepView->id}}">
                            <div class="basic-form">
                                <div class="form-group">
                                    <label for=""><b class="text-success">Name: <span class="text-danger">*</span></b></label>
                                    <input type="text" name="name" value="{{$editStoreKeepView->name}}" class="form-control input-rounded" placeholder="Enter Name">
                                </div>

                                <div class="form-group">
                                    <label for=""><b class="text-success">Mobile: <span class="text-danger">*</span></b></label>
                                    <input type="number" name="mobile" value="{{$editStoreKeepView->mobile}}" class="form-control input-rounded" placeholder="+91-XXXXXXXXXX">
                                </div>

                                <div class="form-group">
                                    <label for=""><b class="text-success">Email: <span class="text-danger">*</span></b></label>
                                    <input type="email" name="email" value="{{$editStoreKeepView->email}}" class="form-control input-rounded" placeholder="demo@gmail.com">
                                </div>

                                <div class="form-group">
                                    <label for=""><b class="text-success">Password: <span class="text-danger">*</span></b></label>
                                    <input type="password" name="password" class="form-control input-rounded" placeholder="Password">
                                </div>

                                <div class="form-group">
                                    <label for=""><b class="text-success">Re-Type password :<span class="text-danger">*</span></b></label>
                                    <input type="password" name="confirm_password" class="form-control input-rounded" placeholder="Re-Type Password">
                                </div>
                                

                               <div class="form-group">
                               <label for=""><b class="text-success">Store :<span class="text-danger">*</span></b></label>
                               
                                 <select id="single-select" class="form-control" name="manager_store_id">
                                    @foreach ($storeDatas as $data)
                                    <option value="{{$data->id}}" {{$data->id == $editStoreKeepView->manager_store_id ? 'selected' : ''}}>{{$data->store_name}}</option>
                                    @endforeach
                                </select>
                               </div>

                                <div class="form-group">
                                    <label for=""><b class="text-success">Status: <span class="text-danger">*</span></b></label> &nbsp;&nbsp;&nbsp;&nbsp;
                                            <input type="radio" name="status" id="" value="1" {{ $editStoreKeepView-> status == 1 ? 'checked' : '' }} / >&nbsp;Active  &nbsp;&nbsp;&nbsp;&nbsp;
                                            <input type="radio" name="status" id=""  value="0"  {{ $editStoreKeepView-> status == 0 ? 'checked' : '' }} />&nbsp;Dective
                                </div>

                            </div>
                            <input type="submit" class="btn btn-primary" value="Update">
                            </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
</div>

@endsection