<?php
use App\Models\Store;
?>
@extends('partials.salesperson.app')
@section('title','Salesperson Home')
@section('content')
@push('style')
<style>
    .card-img-top {
    width: 100%;
    height: 15vw;
    object-fit: cover;
}
</style>
@endpush
<?php
$get_store = Store::where('id',auth()->user()->sales_store_id)->first();
?>
<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Hi, welcome back!(Sale-Person Panel)</h4>
                    <p class="mb-0">{{$get_store->store_name}}</p>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Layout</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Blank</a></li>
                </ol>
            </div>
        </div>

        <div class="row">
            @forelse ($products as $product)
            <div class="col-lg-3 col-sm-6">
                    <div class="card">
                        <img class="card-img-top img-fluid img-thumbnail" src="{{asset('product_images')}}/{{$product->product_img}}" alt="{{$product->product_img}}">
                        <div class="card-body">
                            <h5 class="card-title">{{$product->product_name}}</h5>
                            <p class="card-text">{{$product->product_desc}}</p>
                            <p>Price : &#8377; <span style="color: blue;">{{$product->product_price}}</span></p>
                            <!-- <a href="#" class="btn btn-primary">Add to card</a> -->
                        </div>
                </div>
            </div>
            @empty
                <h4 class="text-center mt-4 text-warning">Product Not Found.</h4>
            @endforelse
        </div>

    </div>
</div>
<!--**********************************
            Content body end
        ***********************************-->

@endsection