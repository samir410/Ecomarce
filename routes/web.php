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

//Route::get('/', function () {
   // return view('layout');
//});
///frontend----------------
Route::get('/', 'HomeController@index');
///.....
/////backend...Admin
Route::get('/back', 'AdminController@index');
////.......
/////backend...Admin_layout
Route::get('/dashboard', 'SuperAdminController@index');
Route::post('/admin-dashboard', 'AdminController@dashboard');
/////logout
Route::get('/logout', 'SuperAdminController@logout');

//////catagory ralated route
Route::get('/add-catagory', 'CatagoryController@index');
Route::get('/all-catagory', 'CatagoryController@all_catagory');
Route::post('/save-catagory', 'CatagoryController@save_catagory');
Route::get('/unactive_catagory/{catagory_id}', 'CatagoryController@unactive_catagory');
Route::get('/active_catagory/{catagory_id}', 'CatagoryController@active_catagory');
Route::get('/edit-catagory/{catagory_id}', 'CatagoryController@edit_catagory');
Route::post('/update-catagory/{catagory_id}', 'CatagoryController@update_catagory');
Route::get('/delete-catagory/{catagory_id}', 'CatagoryController@delete_catagory');

/////////manufacture
Route::get('/add-manufacture', 'ManudactureController@index');
Route::post('/save-manufacture', 'ManudactureController@save_manufacture');
Route::get('/all-manufacture', 'ManudactureController@all_manufacture');
Route::get('/delete-manufacture/{manufacture_id}', 'ManudactureController@delete_manufacture');
Route::get('/unactive_manufacture/{manufacture_id}', 'ManudactureController@unactive_manufacture');
Route::get('/active_manufacture/{manufacture_id}', 'ManudactureController@active_manufacture');
Route::get('/edit-manufacture/{manufacture_id}', 'ManudactureController@edit_manufacture');
Route::post('/update-manufacture/{manufacture_id}', 'ManudactureController@update_manufacture');
///////////products
Route::get('/add-products', 'ProductController@index');
Route::post('/save-product', 'ProductController@save_Product');
Route::get('/all-products', 'ProductController@all_product');
Route::get('/unactive_product/{product_id}', 'ProductController@unactive_product');
Route::get('/active_product/{product_id}', 'ProductController@active_product');
Route::get('/delete-product/{product_id}', 'ProductController@delete_product');
Route::get('/edit-product/{product_id}', 'ProductController@edit_product');
Route::post('/update-product/{product_id}', 'ProductController@update_product');

///////slider
Route::get('/add-slider', 'SliderController@add_slider');
Route::get('/all-slider', 'SliderController@all_slider');
Route::post('/save-slider', 'SliderController@save_slider');
Route::get('/unactive_slider/{slider_id}', 'SliderController@unactive_slider');
Route::get('/active_slider/{slider_id}', 'SliderController@active_slider');
Route::get('/delete-slider/{slider_id}', 'sliderController@delete_slider');
///////////product show catagory links
Route::get('/product_by_catagory/{catagory_id}', 'HomeController@showproduct_by_catagory');
Route::get('/product_by_manufacture/{manufacture_id}', 'HomeController@showproduct_by_manufacture');
/////////////view product
Route::get('/view_product/{product_id}', 'HomeController@product_details');
///////add to cart
Route::post('/add-to-cart', 'CartController@add_cart');
Route::get('/show-cart', 'CartController@show_cart');
Route::post('/update-cart', 'CartController@update_cart');

//////delete to cart
Route::get('/delete-to-cart/{rowID}', 'CartController@delete_cart');

//////cart  checkout
Route::get('/login-check', 'CheckoutController@login_check');
///////login singup
Route::post('/customer_registration', 'CheckoutController@customer_reg');
Route::get('/checkout', 'CheckoutController@checkout');
//////////shiping details
Route::post('/save-shiping-details', 'CheckoutController@save_shiping_details');
//////customer login
Route::post('/customer-login', 'CheckoutController@customer_login');
Route::get('/customer-logout', 'CheckoutController@customer_logout');
/////////////payment
Route::get('/payment', 'CheckoutController@payment');
Route::post('/order-place', 'CheckoutController@order_place');
//////Admin order manage
Route::get('/manage-order', 'OrderController@manage_order');

Route::get('/view-order/{order_id}', 'OrderController@view_order');
/////search product
Route::post('/search-product','ProductController@searchProduct');



