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
//    return view('welcome');
//});



//Foernt-end site  
Route::get('/','MarcateManagementController@index');







//Show product category wise
Route::get('/product_by_category/{category_id}','MarcateManagementController@show_product_by_category');
//Show product brands wise
Route::get('/product_by_brands/{category_id}','MarcateManagementController@show_product_by_brands');
//view products detail
Route::get('/view_products/{products_id}','MarcateManagementController@products_details_by_id');
//add to cart by product
Route::post('/add-to-cart','CartController@add_to_cart');
Route::get('/show-cart','CartController@show_cart_list');
 //delete to cart
Route::get('/delete-to-cart/{id}','CartController@delete_to_cart');
//login check yes or not and shiped by login or signup page 
Route::get('/login-check','CheckoutController@login_check');
//customer signup
Route::post('/customer-signup','CheckoutController@customer_signup');
/*this checkout are use customer login or signup.Now customer signup 
then redirect to shipping addreess page and 2nd time same customer 
do not sign up thy only login and redirect to shipping page........
*/
Route::get('/checkout','CheckoutController@checkout');
//Use Customer had alredy account then the login
Route::post('/customer-login','CheckoutController@customer_login');
//customer logout
Route::get('/customer-logout','CheckoutController@logout');
//shipping details
Route::post('/save-shipping-details','CheckoutController@save_shipping_details');
//payment method
Route::get('/payment','CheckoutController@payment');
//TK pay method
Route::post('/order-place','CheckoutController@order_place');
//Manage Order
Route::get('/manage-order','ManageOrderController@manage_order');
//Manage Order Active Unactive
Route::get('/unactive_order/{order_id}','ManageOrderController@unactive_order');
Route::get('/active_order/{order_id}','ManageOrderController@active_order');
//Delete Order
Route::get('/delete-order/{order_id}','ManageOrderController@delete_order');
//view order details
Route::get('/view-order/{order_id}','ManageOrderController@view_order_details');
















//update to cart
//Route::post('/update-cart','CartController@update_to_cart');
//Route::post('/cart-update/{products_id}/{quantity}','CartController@update_cart'); 
















//Back-end site
Route::get('/admin','AdminController@index');
Route::get('/dashboard','SuperAdminController@index');
Route::post('/admin-dashboard','AdminController@dashboard');
Route::get('/logout','SuperAdminController@logout');

//category releted
Route::get('/add-category','CategoryController@index');
Route::get('/all-category','CategoryController@all_category');
Route::post('/save-category','CategoryController@save_category');
//category status
Route::get('/unactive_category/{category_id}','CategoryController@unactive_category');
Route::get('/active_category/{category_id}','CategoryController@active_category');
//edit and delete category status
Route::get('/edit-category/{category_id}','CategoryController@edit_category');
Route::post('/update-category/{category_id}','CategoryController@update_category');
Route::get('/delete-category/{category_id}','CategoryController@delete_category');





//brand releted
Route::get('/add-brands','BrandsController@index');
Route::get('/all-brands','BrandsController@all_brands');
Route::post('/save-brands','BrandsController@save_brands');
//brand status
Route::get('/unactive_brands/{brands_id}','BrandsController@unactive_brands');
Route::get('/active_brands/{brands_id}','BrandsController@active_brands');
//edit and delete category status
Route::get('/edit-brands/{brands_id}','BrandsController@edit_brands');
Route::post('/update-brands/{brands_id}','BrandsController@update_brands');
Route::get('/delete-brands/{brands_id}','BrandsController@delete_brands');





//products releted
Route::get('/add-products','ProductsController@index');
Route::get('/all-products','ProductsController@all_products');
Route::post('/save-products','ProductsController@save_products');
//category status
Route::get('/unactive_products/{products_id}','ProductsController@unactive_products');
Route::get('/active_products/{products_id}','ProductsController@active_products');
//edit and delete category status
Route::get('/edit-products/{products_id}','ProductsController@edit_products');
Route::post('/update-products/{products_id}','ProductsController@update_products');
Route::get('/delete-products/{products_id}','ProductsController@delete_products');



//Slider Releted
Route::get('/add-slider','SliderController@index');
Route::get('/all-slider','SliderController@all_slider');
Route::post('/save-slider','SliderController@save_products');
//slider status
Route::get('/unactive_slider/{slider_id}','SliderController@unactive_slider');
Route::get('/active_slider/{slider_id}','SliderController@active_slider');
//delete category status
Route::get('/delete-slider/{slider_id}','SliderController@delete_slider');


//admin info show
Route::get('/admin-information','AdminController@all_admin_information');

// //user info show
// Route::get('/user-information','BuyerInformationController@customer_signup_information');
