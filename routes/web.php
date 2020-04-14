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

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth' /*, 'roles'*/]], function () {
	Route::resource('users', 'User\UserController');
	Route::resource('products', 'Product\ProductController');
	Route::resource('categories', 'Category\CategoryController');
});

Route::get('/', function () {
    //return view('admin.users.index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/checkout/formulario', 'HomeController@formularioCheckaout')->name('checkout.formulario');
Route::post('/checkout/test', 'HomeController@test')->name('checkout.test');
Route::get('/checkout/thanks', 'HomeController@thanks')->name('checkout.thanks');
Route::get('/checkout/pending', 'HomeController@pending')->name('checkout.pending');
Route::get('/checkout/error', 'HomeController@error')->name('checkout.error');
Route::get('/ipn', 'HomeController@ipn')->name('ipn');
