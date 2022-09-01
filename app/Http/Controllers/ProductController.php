<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProductController extends Controller
{
   public function index()
   {
      $products = Product::where('store_id',auth()->user()->manager_store_id)->get();
      return view('store.product.index', compact('products'));
   }
   public function addProductView()
   {
      return view('store.product.add');
   }

   public function productStore(Request $request)
   {
      $validatedData = $request->validate([
         'product_name' => 'required',
         'product_price' => 'required',
         'product_qty' => 'required',
         'product_desc' => 'required',
         'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
      ]);

      $productStore = new Product();
      $productStore->store_id = auth()->user()->manager_store_id;
      $productStore->product_name = strtoupper($request->product_name);
      $productStore->product_price = $request->product_price;
      $productStore->product_qty = $request->product_qty;
      $productStore->product_desc = $request->product_desc;

      if ($image = $request->file('image')) {
         $destinationPath = 'product_images';
         $uploadImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
         $image->move($destinationPath, $uploadImage);
         $productStore->product_img =  $uploadImage;
      }
      $productStore->save();
      return redirect()->route('store.product')->with('success', 'Product Create Successfully.....!');
   }

   public function editProductView($id)
   {
      $editProductView = Product::find($id);
      return view('store.product.edit', compact('editProductView'));
   }

   public function productUpdate(Request $request)
   {
      $productUpdate = Product::find($request->id);

      $productUpdate->product_name = strtoupper($request->product_name);
      $productUpdate->product_price = $request->product_price;
      $productUpdate->product_qty = $request->product_qty;
      $productUpdate->product_desc = $request->product_desc;

      if ($request->file('image') != NULL) {

         // Old Image Delete Code Start
         if ($productUpdate->image != NULL) {
            unlink('product_images/' . $productUpdate->image);
         }
         // Old Image Delete Code End
         $image = $request->file('image');
         $destinationPath = 'product_images';
         $uploadImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
         $image->move($destinationPath, $uploadImage);
         $productUpdate->product_img =  $uploadImage;
      }

      $productUpdate->update();
      return redirect()->route('store.product')->with('success', 'Product Update Successfully.....!');
   }

   public function productDelete($id)
   {
      $productDelete = Product::find($id)->delete();
      return redirect()->route('store.product')->with('delete', 'Product Deleted Successfully.....!');
   }

   // Sale_person Function 

   public function salePerson()
   {
      // $salePersons = User::where('role', 3)->get();
      $salePersons = User::join('stores','users.sales_store_id','=','stores.id')->where('users.role', 3)->where('users.sales_store_id', auth()->user()->manager_store_id)->select('stores.*','users.*')->get();

      return view('store.salePersons.index', compact('salePersons'));
   }

   public function addSalePersonView()
   {
      $data['products'] = product::where('status', 1)->get();
      return view('store.salePersons.add', $data);
   }

   public function salePersonStore(Request $request)
   {
      $validatedData = $request->validate([
         'name' => 'required',
         'mobile' => 'required|unique:users|max:10',
         'email' => 'required|unique:users|max:255',
         'password' => 'min:8',
         'password_confirmation' => 'required_with:password|same:password|min:8',
      ]);
      $salePersonStore = new User();
      $salePersonStore->name = strtoupper($request->name);
      $salePersonStore->mobile = $request->mobile;
      $salePersonStore->email = $request->email;
      $salePersonStore->password = Hash::make($request->password);
      $salePersonStore->sales_store_id = auth()->user()->manager_store_id;
      $salePersonStore->image = 'avtar.jpg';
      $salePersonStore->role = 3;
      $salePersonStore->save();
      return redirect()->route('store.salePerson')->with('success', 'Sale-Person Create Successfully.....');
   }

   public function editSalePersonView($id)
   {
      $editSalePersonView = User::find($id);
      $productDatas = product::get();
      return view('store.salePersons.edit', compact('editSalePersonView', 'productDatas'));
   }

   public function updateSalePerson(Request $request)
   {
      $updateStoreKeeper = User::find($request->id);
      $updateStoreKeeper->name = strtoupper($request->name);
      $updateStoreKeeper->mobile = $request->mobile;
      $updateStoreKeeper->email = $request->email;
      $updateStoreKeeper->status = $request->status;

      if ($request->password != '') {
         $updateStoreKeeper->password = Hash::make($request->password);
      }

      // $updateStoreKeeper->manager_store_id = $request->sales_store_id;
      $updateStoreKeeper->image = 'avtar.jpg';
      $updateStoreKeeper->role = 3;
      $updateStoreKeeper->update();

      return redirect()->route('store.salePerson')->with('success', 'Sale-Person Update Successfully.....');
   }


   public function salePersonDelete($id)
   {
      $salePersonDelete = User::find($id)->delete();
      return redirect()->route('store.salePerson')->with('delete', 'Sale-Person Deleted Successfully.....');
   }


}
