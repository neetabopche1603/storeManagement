<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class SalesmenController extends Controller
{
    public function salesHome()
    {
        $data['products'] = Product::where('store_id', auth()->user()->sales_store_id)->get();
        return view('salesPerson.home', $data);
    }

    public function generateBill()
    {
        $data['products'] = Product::where('store_id', auth()->user()->sales_store_id)->get();
        return view('salesPerson.generateBill', $data);
    }

    public function AjaxProductGet(Request $request)
    {
        $products = Product::whereIn('id', $request->ids)->get();
        return response()->json($products);
    }
}
