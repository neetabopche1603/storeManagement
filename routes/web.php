<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SalesmenController;
use App\Http\Controllers\StoreController;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Login Route
Route::post('login', [LoginController::class, 'login'])->name('loginPost');
Route::get('/login', function () {
    return view('login.login');
})->name('login');

// Logout Route
Route::get('/logout', function () {
    Auth::logout();
    return redirect()->route('login');
})->name('logout');

// Admin Route
Route::group(['prefix' => 'admin','middleware' => 'auth'], function () {
    Route::get('/home', function () {
        return view('admin.home');
    })->name('admin.home');
    // Store Route
    Route::get('show-stores',[StoreController::class,'index'])->name('admin.Stores');
    Route::get('add-store',[StoreController::class,'addStoreView'])->name('admin.addStores');
    Route::post('add-store',[StoreController::class,'addStorePost'])->name('admin.addStorePost');
    Route::get('edit-store/{id}',[StoreController::class,'editStoreView'])->name('admin.editStoreView');
    Route::post('edit-store',[StoreController::class,'storeUpdate'])->name('admin.storeUpdate');
    Route::get('delete-store/{id}',[StoreController::class,'storeDelete'])->name('admin.storeDelete');

    // StoreKeeper's Route
    Route::get('show-storeKeeper',[StoreController::class,'storeKeeprs'])->name('admin.storeKeeprs');
    Route::get('add-storeKeeper',[StoreController::class,'addStoreKeepView'])->name('admin.addStoreKeep');
    Route::post('add-storeKeeper',[StoreController::class,'storeKeeperStore'])->name('admin.storeKeeperStore');
    Route::get('edit-storeKeeper/{id}',[StoreController::class,'editStoreKeepView'])->name('admin.editStoreKeep');
    Route::post('edit-storeKeeper',[StoreController::class,'updateStoreKeeper'])->name('admin.updateStoreKeeper');
    Route::get('view-storeKeeper/{id}',[StoreController::class,'storeKeeperViewPage'])->name('admin.storeKeeperViewPage');
    Route::get('delete-storeKeeper/{id}',[StoreController::class,'storeKeeperDelete'])->name('admin.storeKeeperDelete');


});

// Store Route
Route::group(['prefix' => 'store','middleware' => 'is_store'], function () {
    Route::get('/home', function () {
        return view('store.home');
    })->name('store.home');

    Route::get('show-product',[ProductController::class,'index'])->name('store.product');
    Route::get('add-product',[ProductController::class,'addProductView'])->name('store.addProductView');
    Route::post('add-product',[ProductController::class,'productStore'])->name('store.productStore');
    Route::get('edit-product/{id}',[ProductController::class,'editProductView'])->name('store.editProductView');
    Route::post('edit-product/',[ProductController::class,'productUpdate'])->name('store.productUpdate');
    Route::get('delete-product/{id}',[ProductController::class,'productDelete'])->name('store.productDelete');

    // Sale-person Route
    Route::get('show-saleperson',[ProductController::class,'salePerson'])->name('store.salePerson');
    Route::get('add-saleperson',[ProductController::class,'addSalePersonView'])->name('store.addSalePersonView');
    Route::post('add-saleperson',[ProductController::class,'salePersonStore'])->name('store.salePersonStore');
    Route::get('edit-saleperson/{id}',[ProductController::class,'editSalePersonView'])->name('store.editSalePersonView');
    Route::post('edit-saleperson',[ProductController::class,'updateSalePerson'])->name('store.updateSalePerson');
    Route::get('delete-saleperson/{id}',[ProductController::class,'salePersonDelete'])->name('store.salePersonDelete');

});

// Sale-Persons Route
Route::group(['middleware' => 'sales_person'], function () {
    Route::get('/salesPerson',[SalesmenController::class,'salesHome'])->name('salesPerson.home');
    Route::get('/generate-bill',[SalesmenController::class,'generateBill'])->name('salesPerson.generateBill');
    Route::post('/product-fetch',[SalesmenController::class,'AjaxProductGet'])->name('AjaxProductGet');
});

