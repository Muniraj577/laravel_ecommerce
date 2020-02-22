<?php

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

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('roles', 'RoleController');
    Route::resource('users', 'UserController');
    Route::resource('permissions', 'PermissionController');
    Route::resource('categories', 'CategoryController');
    Route::resource('products', 'ProductController');
    Route::get('add-product-images/{product}', 'ProductController@addMultipleImage')->name('addImages');
    Route::resource('product_images', 'ProductImageController');
    Route::resource('user_orders', 'UserOrderController');
    Route::post('product-multiple-images', 'ProductImageController@store')->name('addMultipleImages');
    Route::get('get-products', 'ProductImageController@getProducts')->name('get-products');
    Route::delete('user-order-delete/{id}', 'UserOrderController@deleteUserOrderAndItems')->name('deleteUserOrderItems');
    Route::get('user-show-orders/{id}', 'UserOrderController@showOrder')->name('user_orders.showOrder');

//    Route::get('product-images/{id}/edit', 'ProductImageController@edit')->name('product_images.edit');
//    Route::put('product-images/update/{id}', 'ProductImageController@updateImage')->name('product_images.update');
//    Route::delete('product-images/delete/{productImage}', 'ProductImageController@deleteImage')->name('product_images.delete');
});

Route::get('/', 'Frontend\FrontendController@index')->name('frontend.index');
Route::get('/user-register', 'Frontend\FrontendController@user_register')->name('user-register');
Route::get('/user-login', 'Frontend\FrontendController@user_login')->name('user-login');
Route::get('/shop', 'Frontend\FrontendController@shop')->name('shop');
Route::get('/shop/{id}', 'Frontend\FrontendController@shop')->name('frontend.shop');
Route::get('/product_detail/{product}', 'Frontend\FrontendController@product_detail')->name('product-detail');
Route::get('/checkout', 'Frontend\FrontendController@checkout')->name('checkout');


Route::get('/addToCart/{product}', 'CartController@add')->name('cart.add');
Route::get('/shopping-cart', 'CartController@showCart')->name('cart.show');
Route::delete('/shopping-cart/{product}', 'CartController@destroy')->name('cart.remove');
Route::put('/shopping-cart/{product}', 'CartController@update')->name('cart.update');

Route::post('/order/add', 'Frontend\OrderController@store')->name('order.add');
