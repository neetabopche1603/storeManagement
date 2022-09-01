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
                        <h4 class="card-title">Add Product</h4>
                        <a href="javascript:void(0)" onclick="history.back()" class="btn btn-primary float-lg-right mb-2"><i class="fa fa-backward" aria-hidden="true"></i>&nbsp;Back</a>
                        <!-- <p class="card-description">
                    Basic form layout
                  </p> -->
                        <form class="forms-sample" action="{{route('store.productStore')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="">Product Name</label>
                                    <input type="text" class="form-control" name="product_name" placeholder="Product">
                                    <span class="text-danger">
                                        @error('product_name')
                                            {{$message}}
                                        @enderror
                                    </span>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="">Product Price</label>
                                    <input type="text" class="form-control" name="product_price" placeholder="Rs.100">
                                    <span class="text-danger">
                                        @error('product_price')
                                            {{$message}}
                                        @enderror
                                    </span>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="">Quantity</label>
                                    <input type="number" class="form-control" name="product_qty" placeholder="Quantity">
                                    <span class="text-danger">
                                        @error('product_qty')
                                            {{$message}}
                                        @enderror
                                    </span>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="">Product Image</label>
                                    <input type="file" class="form-control" name="image">   
                                    <span class="text-danger">
                                        @error('image')
                                            {{$message}}
                                        @enderror
                                    </span>
                                </div>
                              
                                <div class="form-group col-md-12">
                                 <label for="">Description</label>
                                <textarea name="product_desc" class="form-control" id="" cols="30" rows="10"></textarea>
                                <span class="text-danger">
                                        @error('product_desc')
                                            {{$message}}
                                        @enderror
                                    </span>
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