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

Route::view('/', 'home');
Route::get('contact', 'ContactFormController@create')->name('contact.create');
Route::post('contact', 'ContactFormController@store')->name('contact.store');
Route::view('about', 'about')->middleware('test');//This test is registered in Middleware>Kernel.php>$routeMiddleware

Route::get('customers', 'CustomersController@index')->name('customers.index');
Route::get('customers/create', 'CustomersController@create')->name('customers.create');
Route::post('customers', 'CustomersController@store')->name('customers.store');
Route::get('customers/{customer}', 'CustomersController@show')->name('customers.show');
Route::get('customers/{customer}/edit', 'CustomersController@edit')->name('customers.edit');
Route::patch('customers/{customer}', 'CustomersController@update')->name('customers.update');
Route::delete('customers/{customer}', 'CustomersController@destroy')->name('customers.destroy');

//Route::resource('customers','CustomersController')->middleware('auth');//for controller middleware
//Route::resource('customers','CustomersController');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
