@extends('partials.stores.app')
@section('title','Store Home')
@section('store-content')

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
                        <h4 class="card-title">Edit Sale-Person's</h4>
                        <a href="javascript:void(0)" onclick="history.back()" class="btn btn-primary float-lg-right mb-2"><i class="fa fa-backward" aria-hidden="true"></i>&nbsp;Back</a>
                        <!-- <p class="card-description">
                    Basic form layout
                  </p> -->
                        <form class="forms-sample" action="{{route('store.updateSalePerson')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{$editSalePersonView->id}}">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="">Name</label>
                                    <input type="text" class="form-control" name="name" value="{{$editSalePersonView->name}}" placeholder="Enter Name">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for=""> Mobile</label>
                                    <input type="number" class="form-control" value="{{$editSalePersonView->mobile}}" name="mobile" placeholder="+91-XXXXXXXXXX">
                                    <span class="text-danger">
                                        @error('mobile')
                                        {{$message}}
                                        @enderror
                                    </span>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="">Email</label>
                                    <input type="email" class="form-control" value="{{$editSalePersonView->email}}" name="email" placeholder="demo@gmail.com">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="">Password</label>
                                    <input type="password" name="password" class="form-control input-rounded" placeholder="Password">
                                   
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="">Password</label>
                                    <input type="password" name="password_confirmation" class="form-control input-rounded" placeholder="Re-Type Password">
                                    
                                </div>

                                {{--<div class="form-group col-md-6">
                                    <label for="">Product</label>
                                    <select id="single-select" class="form-control" name="sales_store_id">
                                        
                                    @foreach ($productDatas as $data)
                                    <option value="{{$data->id}}" {{$data->id == $editSalePersonView->sales_store_id ? 'selected' : ''}}>{{$data->product_name}}</option>
                                    @endforeach
                                    
                                    </select>
                                </div>--}}


                                <div class="form-group col-md-6">
                                    <label for=""><b class="text-success">Status:</b></label> &nbsp;&nbsp;&nbsp;&nbsp;
                                            <input type="radio" name="status" id="" value="1" {{ $editSalePersonView-> status == 1 ? 'checked' : '' }} / >&nbsp;Active  &nbsp;&nbsp;&nbsp;&nbsp;
                                            <input type="radio" name="status" id=""  value="0"  {{ $editSalePersonView-> status == 0 ? 'checked' : '' }} />&nbsp;Dective
                                    </select>
                                </div>


                            </div>
                            <!-- Row End Div -->
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            <button type="reset" class="btn btn-light">Reset</button>
                        </form>
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