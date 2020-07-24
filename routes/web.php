<?php

use App\Http\Controllers\UserController;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
//use Session;
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
    //$request->session()->put('token', $value);
    //return Http::get('http://restschool.hridham.com/api/getAllAlbums')->json();
})->name('home');
Route::post('/login', 'UserController@login');
Route::resource('albums', 'AlbumController');
Route::resource('albums.photo', 'PhotoController');
Route::resource('testimonials', 'TestimonialsController');

Route::resource('product_categories', 'ProductCategoryController')->except('index');

Route::get('product_cat_list/{page?}','ProductCategoryController@index')->name('product_cat.index');

Route::resource('product_sub_categories', 'ProductSubCategoryController')->except('index');

Route::get('product_sub_cat_list/{page?}','ProductSubCategoryController@index')->name('product_sub_cat.index');


Route::resource('supplier_categories', 'SupplierCategoryController')->except('index');

Route::get('supplier_cat_list/{page?}','SupplierCategoryController@index')->name('supplier_cat.index');


Route::resource('vendor_categories', 'VendorCategoryController')->except('index');

Route::get('vendor_cat_list/{page?}','VendorCategoryController@index')->name('vendor_cat.index');

Route::resource('status', 'StatusController')->except('index');

Route::get('status_list/{page?}','StatusController@index')->name('status.index');

Route::resource('items', 'ItemController')->except('index');

Route::get('item_list/{page?}','ItemController@index')->name('item.index');

Route::resource('item_variants', 'ItemVariantController')->except('index');

Route::get('item_variant_list/{page?}','ItemVariantController@index')->name('item_variant.index');

Route::resource('stock_masters', 'StockMasterController')->except('index');

Route::get('stock_master_list/{page?}','StockMasterController@index')->name('stock_master.index');

Route::resource('suppliers', 'SupplierController')->except('index');

Route::get('supplier_list/{page?}','SupplierController@index')->name('supplier.index');


Route::resource('vendors', 'VendorController')->except('index');

Route::get('vendor_list/{page?}','VendorController@index')->name('vendor.index');


// Route::get('product_categories/{page?}', function (Request$page=0) {
//     echo $page;
// });

// Route::post('/login', function () {
// $respose=Http::post('http://restschool.hridham.com/api/login',[
//     "username"=>"admin",
//     "password"=>"12345678"
// ]);

// //Session::put('token',$respose->json()['token']);
// session()->put('token', $respose->json()['token']);
//   return dd(session()->get('token'));
// });
Route::get('getuser', function () {
    return 1;
});

