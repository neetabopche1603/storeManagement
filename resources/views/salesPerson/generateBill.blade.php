@extends('partials.salesperson.app')
@section('title','Salesperson Bill Generate')
@section('content')
@push('style')
<style>
    .inputTbl {
        outline: none;
        border: none;
        background-color: #fff;
        color: blue;
        font-weight: 400;
    }

    .inputTblqty:hover {
        background-color: #000;
        color: #fff;
    }

    #productTable {
        display: none;
    }
</style>

@endpush

<!--**********************************
            Content body start
        ***********************************-->
<!-- <div class="content-body">
    <div class="container-fluid"> -->
<!--  yaha pr form banao customers details ke sath customer name,phoneNo.,address -->
<!-- then uske neeche ek dropdown me sabhi products ki list show hogi fir jo bhi product select 
    karoge dropdown mese wo table me show hojayega one by one then uski quantity daalna price hai hi apne paas
    usse calculation hokr total amount aajeyga neeche
    uske baad ek buttom hoga print ka usse print hoga itna kardo fir apan karte hai -->

<!-- </div>
</div> -->
<!--**********************************
            Content body end
        ***********************************-->

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
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Bill</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)"></a></li>
                </ol>
            </div>
        </div>
        <!-- row -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Customers details</h4>
                        <a href="javascript:void(0)" onclick="history.back()" class="btn btn-primary btn-lg float-lg-right"><i class="fa fa-backward"></i> &nbsp;Back</a>
                    </div>

                    <div class="card-body">
                        <form action="#" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="basic-form">
                                <div class="form-group">
                                    <label for=""><b class="text-success"> Name: <span class="text-danger">*</span></b></label>
                                    <input type="text" name="name" class="form-control input-rounded" placeholder="">

                                </div>

                                <div class="form-group">
                                    <label for=""><b class="text-success">Phone: <span class="text-danger">*</span></b></label>
                                    <input type="number" name="phone_number" class="form-control input-rounded" placeholder="+91-XXXXXXXXXX">
                                </div>

                                <div class="form-group">
                                    <label for=""><b class="text-success">Email: <span class="text-danger">*</span></b></label>
                                    <input type="email" name="store_email" class="form-control input-rounded" placeholder="demo@gmail.com">
                                </div>

                                <div class="form-group">
                                    <label for=""><b class="text-success">Address: <span class="text-danger">*</span></b></label>
                                    <!-- <input type="text" class="form-control input-rounded" placeholder="D-mart"> -->
                                    <textarea class="form-control" name="store_address" rows="4" id="comment"></textarea>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6 col-md-10 col-lg-10">
                                        <div class="form-group">
                                            <label for=""><b class="text-success">Choose Product : <span class="text-danger">*</span></b></label>
                                            <select name="products[]" id="product_select" class="form-control product_select" multiple="multiple">
                                                <!-- <option value="">Choose Product</option> -->
                                                @foreach ($products as $product)
                                                <option value="{{$product->id}}">Product : {{$product->product_name}} -- Price : {{$product->product_price}} -- Qty : {{$product->product_qty}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-2 col-lg-2">
                                        <button type="button" class="btn btn-success mt-4" onclick="getSelectedProduct()">Done</button>
                                    </div>
                                </div>

                            </div>
                            <div class="table-responsive" id="productTable">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Product Name</th>
                                            <th>Qty</th>
                                            <th>Price</th>
                                        </tr>
                                    </thead>
                                    <tbody id="row">

                                    </tbody>
                                </table>
                            </div>
                            <input type="submit" class="btn btn-primary" value="Generate Bill">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@endsection
@push('script')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
<script>
    $(document).ready(function() {
        $('#product_select').select2();
    });
</script>

<script>
    function getSelectedProduct() {
        const table = $('#productTable').hide()
        const ids = $('#product_select').select2("val");
        const url = `{{route('AjaxProductGet')}}`;
        if (ids.length != 0) {
            $.ajax({
                type: "POST",
                url: url,
                data: {
                    'ids': ids,
                },
                success: function(response) {
                    // const data = JSON.parse(response);
                    const row = $('#row');
                    let html = '';
                    table.show();
                    $.each(response, function(index) {
                        html += ` <tr>
                                    <td><input type="text" name="product_name" class="inputTbl" value="${response[index].product_name}" disabled></td>
                                            <td><input type="number" name="qty" class="inputTblqty" value="1" min="1"></td>
                                            <td><input type="text" name="price" class="inputTbl" value="${response[index].product_price}" disabled></td>
                                        </tr>`;
                    });
                    row.html(html)

                }
            });
        } else {
            alert('Please select product.')
        }

    }
</script>
@endpush