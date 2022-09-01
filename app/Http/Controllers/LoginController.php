<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function loginView(){
        return view('login.login');
    }

    public function login(Request $request)
    {   
        $input = $request->all();
   
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $data = [];
   
        if(auth()->attempt(array('email' => $input['email'], 'password' => $input['password'])))
        {
            if (auth()->user()->role == 1) {
                return redirect()->route('admin.home');
            }
            elseif(auth()->user()->role == 2 && auth()->user()->manager_store_id != null)
            {
              
                return redirect()->route('store.home');
            }
            elseif(auth()->user()->role == 3 && auth()->user()->sales_store_id != null)
            {
                return redirect()->route('salesPerson.home');
            }
        }else{
            return redirect()->route('login')
                ->with('error','Email-Address And Password Are Wrong.');
        }
    }
}
