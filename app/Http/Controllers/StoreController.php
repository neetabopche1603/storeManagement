<?php

namespace App\Http\Controllers;

use App\Models\Store;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StoreController extends Controller
{
    public function index()
    {
        $storeData = Store::get();
        return view('admin.store.index', compact('storeData'));
    }

    public function addStoreView()
    {
        return view('admin.store.add-store');
    }

    public function addStorePost(Request $request)
    {
        // $validatedData = $request->validate([
        //     'store_name' => 'required',
        //     'phone_number' => 'required|unique:stores|max:10',
        //     'store_email' => 'required|unique:stores|max:255',
        //     'store_address' => 'required',
        //   ]);

        $stores = new Store();
        $stores->store_name = strtoupper($request->store_name);
        $stores->phone_number = $request->phone_number;
        $stores->email = $request->store_email;
        $stores->address = $request->store_address;
        $stores->save();
        return redirect()->route('admin.Stores')->with('success', 'Store Create Successfully.....');
    }

    public function editStoreView($id)
    {
        $editStoreView = Store::find($id);
        return view('admin.store.edit-store', compact('editStoreView'));
    }

    public function storeUpdate(Request $request)
    {
        $storeUpdate =  Store::find($request->id);
        $storeUpdate->store_name = strtoupper($request->store_name);
        $storeUpdate->phone_number = $request->phone_number;
        $storeUpdate->email = $request->store_email;
        $storeUpdate->address = $request->store_address;
        $storeUpdate->status = $request->status;
        $storeUpdate->update();
        return redirect()->route('admin.Stores')->with('success', 'Store Update Successfully.....');
    }

    public function storeDelete($id)
    {
        $storeDelete = Store::find($id)->delete();
        return redirect()->route('admin.Stores')->with('delete', 'Store Delete Successfully.....');
    }
    // StoreKeerers Function
    public function storeKeeprs()
    {
        // $storeKeeprs = User::where('role', 2)->get();
        
        $storeKeeprs = User::join('stores','users.manager_store_id','=','stores.id')->where('users.role', 2)->select('stores.*','users.*')->get();

        return view('admin.storeKeepers.index', compact('storeKeeprs'));
    }
    
    public function addStoreKeepView()
    {
        $data['stores'] = Store::where('status',1)->get();
        return view('admin.storeKeepers.add',$data);
    }
    
    public function storeKeeperStore(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'mobile' => 'required|unique:users|max:10',
            'email' => 'required|unique:users|max:255',
            'password' => 'min:8',
            'password_confirmation' => 'required_with:password|same:password|min:8',
            'manager_store_id' => 'required',
            'image.*' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',

        ]);

        $storeKeeperStore = new User();
        $storeKeeperStore->name = strtoupper($request->name);
        $storeKeeperStore->mobile = $request->mobile;
        $storeKeeperStore->email = $request->email;
        $storeKeeperStore->password = Hash::make($request->password);
        $storeKeeperStore->manager_store_id = $request->manager_store_id;
        $storeKeeperStore->image = 'avtar.jpg';
        $storeKeeperStore->role = 2;
        $storeKeeperStore->save();
        return redirect()->route('admin.storeKeeprs')->with('success', 'StoreKeepers Create Successfully.....');

    }

    public function editStoreKeepView($id)
    {
        $editStoreKeepView = User::find($id);
        $storeDatas = Store::get();
        return view('admin.storeKeepers.edit',compact('editStoreKeepView','storeDatas'));
    }

    public function updateStoreKeeper(Request $request){
        $updateStoreKeeper = User::find($request->id);
        $updateStoreKeeper->name = strtoupper($request->name);
        $updateStoreKeeper->mobile = $request->mobile;
        $updateStoreKeeper->email = $request->email;
        $updateStoreKeeper->status = $request->status;

        if($request->password != ''){
         $updateStoreKeeper->password = Hash::make($request->password);
        }

        $updateStoreKeeper->manager_store_id = $request->manager_store_id;
        $updateStoreKeeper->image = 'avtar.jpg';
        $updateStoreKeeper->role = 2;
        $updateStoreKeeper->update();

        return redirect()->route('admin.storeKeeprs')->with('success', 'StoreKeepers Update Successfully.....');
    }

    public function storeKeeperViewPage($id){
        // $StoreKeepView = User::find($id);
        $StoreKeepView = User::join('stores','users.manager_store_id','=','stores.id')->where('users.role', 2)->select('stores.*','users.*')->find($id);
        return view('admin.storeKeepers.view',compact('StoreKeepView'));
    }

    public function storeKeeperDelete($id){
        $storeKeeperDelete = User::find($id)->delete();
        return redirect()->route('admin.storeKeeprs')->with('delete', 'StoreKeepers Deleted Successfully.....');
    }
}
