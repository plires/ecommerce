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

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth' ,'admin']], function () {
	Route::resource('users', 'User\UserController');
	Route::resource('products', 'Product\ProductController');
	Route::resource('categories', 'Category\CategoryController');
});

Route::group(['namespace' => 'Front'], function () {
	//Products
	Route::get('/products/{product}', 'Product\ProductController@show');

	// Cart
	Route::get('/cart', 'CartDetail\CartDetailController@index');
	Route::post('/cart', 'CartDetail\CartDetailController@store');
	Route::delete('/cart/{id}', 'CartDetail\CartDetailController@destroy');
});

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');


Route::get('/', function () {
    //return view('admin.users.index');
});

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/checkout/formulario', 'HomeController@formularioCheckaout')->name('checkout.formulario');
Route::post('/checkout/test', 'HomeController@test')->name('checkout.test');
Route::get('/checkout/thanks', 'HomeController@thanks')->name('checkout.thanks');
Route::get('/checkout/pending', 'HomeController@pending')->name('checkout.pending');
Route::get('/checkout/error', 'HomeController@error')->name('checkout.error');
Route::get('/ipn', 'HomeController@ipn')->name('ipn');
